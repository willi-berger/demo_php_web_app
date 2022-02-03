# PHP Demo App

A simple demo web app, with some basic reusable common framework logic.

* dockerized environment with
- PHP container
- Composer
- Maria DB
- Adminer
* basic MVC classes and logic

Info about dockerized workspace setup. 
[php-development-environment-in-docker](https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod)

## Docker
Some notes about *docker* usage
### Build an image for an application
 
1. create Docker file

```
FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./app/app.php" ]
```

2. Build docker image

```
$ docker build -ts my-php-app .
```

3. Run Docker image


```
$ docker run -it --rm --name my-running-app my-php-app
```

## Run a single PHP script
To run a single php script use:

```
docker run -it --rm \
    --name my-running-script \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp \
    php:7.4-cli php app.php
```

## Run app on a server

Image *php-apache-dev-env* is a customized php image with some extensions. See *Dockerfile-PhpDev*.


```
$ docker run -d -p 80:80 \
	-u  $(id -u):$(id -g) --rm \
	--name my-running-app \
	-v "$PWD":/var/www/html \
	php-apache-dev-env

$docker rm -f my-running-app
```


## Composer
[Composer](https://getcomposer.org/) is used to include external libraries into the project. Composer is also run as docker container. To install the depencencies:

* run as root (preferred)

```
docker run --rm --interactive --tty \
  --volume $PWD:/app \
  --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
  composer <command>
```

* or run as user

```
docker run --rm --interactive --tty \
  --volume $PWD:/app \
  --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
  --user $(id -u):$(id -g) \

  composer <command>
```

*ToDo*: run as user does not load all classes, we get compile errors in eclipse ?

## Maria DB

MariaDB is run as a container using the official [mariadb](https://hub.docker.com/_/mariadb) image.

### Create new instance

First, start a new Maria DB instance and attach it to a docker network. Attaching the container to a network, allows accessing the DB from other containers, e.g. the PHP application container.

```
$ docker network create mariadb-network 

$ docker run --detach \
	--network mariadb-network \
	--name my-mariadb \
	--env MARIADB_USER=willie \
	--env MARIADB_PASSWORD=password \
	--env MARIADB_ROOT_PASSWORD=password \
	 mariadb:latest
```

To initialize the DB with schema and content, one can copy some SQL files onto server and run them with.

```
$ docker cp 01-create-database.sql my-mariadb:/01.sql
$ docker exec -i my-mariadb mysql -uroot -p"$MARIADB_ROOT_PASSWORD"  < /01.sql

```

Alternativly the DB could be initialized with some PHP cli script, as it is done in this project here.

### Start existing instance

If once created, the DB instance can be started with with:

```
$docker start my-mariadb
```

Note: The data from previous sessions will be available again, when container *my-mariadb* is started, because the default settings of the image ensures, that the data is stored in some docker volume.


### Start adminer (mysqlAdmin)

```
$ docker run -d  --network mariadb-network --link my-mariadb:db -p 8080:8080 adminer
```

### MySQL from command line
Connect with mysql client from command line
* with exec into running container

```
$ docker exec -it my-mariadb mysql -uroot -p
```

* or as new container running mysql and connecting to DB container via network

```
$ docker run -it --network mariadb-network --rm mariadb mysql -hmy-mariadb -uroot -ppassword

```
## Running the Application
The application can be run by startring individual containers, PHP app and MariaDB, or with docker compose.

### With individual containers

1. start prepared MariaDB container

```
$docker start my-mariadb
```

2. start php app server with

```
docker run \
	-d -p 80:80 \
	-u  $(id -u):$(id -g) \
	--rm --name my-simple-rest-server \
	-v "$PWD":/var/www/html \
	php-apache-dev-env
```


## With Docker compose

The source contains a *docker-compose.yml* with which all containers can be started at once.

```
$ export DOCKER_USER=$(id -u):$(id -g)
$ docker-compose up -d
```

Docker creates a default network with name *demo_php_web_app_default*, which could be used by other containers to connect to the DB. For exymple when running the DB init cli scripts.
For example:

```
$ docker run -it --rm --network demo_php_web_app_default -v "$PWD":/usr/src/myapp -w /usr/src/myapp php-apache-dev-env php  _setup/init-mysqli.php
```


