# PHP REST server

info about dockerized workspace setup 
[php-development-environment-in-docker](https://dev.to/truthseekers/setup-a-basic-local-php-development-environment-in-docker-kod)

## Docker - as image
1. create Docker file

```
FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./app/app.php" ]
```

2. Build docker image

```
$ docker build -t simple-rest-server .
```

3. Run Docker image


```
$ docker run -it --rm --name my-running-app my-php-app
```
docker 

## Run as single script
```
docker run -it --rm \
    --name my-running-script \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp \
    php:7.4-cli php app.php
```

## Run app on server

Image *php-apache-dev-env* is my customized

```
$ docker run -d -p 80:80 \
	-u  $(id -u):$(id -g) --rm \
	--name my-running-app \
	-v "$PWD":/var/www/html \
	php-apache-dev-env

$docker rm -f my-running-app
```


## Composer

runs as root

```
docker run --rm --interactive --tty \
  --volume $PWD:/app \
  --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
  composer <command>
```

run as user

```
docker run --rm --interactive --tty \
  --volume $PWD:/app \
  --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
  --user $(id -u):$(id -g) \

  composer <command>
```

*ToDo*: run as user does not load all classes, we get compile errors in eclipse ?

## Maria DB

Start a new DB instance

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

Copy some files onto server and run them

```
$ docker cp 01-create-database.sql my-mariadb:/01.sql
$ docker exec -i my-mariadb mysql -uroot -p"$MARIADB_ROOT_PASSWORD"  < /01.sql

```

### Start adminer (mysqlAdmin)

```
$ docker run -d  --network mariadb-network --link my-mariadb:db -p 8080:8080 adminer
```

Connect from command line, with exec into running container

```
$ docker exec -it my-mariadb mysql -uroot -p
```

or as new container running mysql and connecting to DB container via network

```
$ docker run -it --network mariadb-network --rm mariadb mysql -hmy-mariadb -uroot -ppassword

```


