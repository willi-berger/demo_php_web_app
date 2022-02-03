#!/usr/bin/env bash


# start dockerized dev server for this app
# docker image php-apache-dev-env see

docker run \
	-d -p 80:80 \
	-u  $(id -u):$(id -g) \
	--network mariadb-network \
	--rm --name my-simple-rest-server \
	-v "$PWD":/var/www/html \
	php-apache-dev-env