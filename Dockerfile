FROM php:7.4-cli


COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./index.php" ]

# docker build -t my-php-cli:1.1 .
