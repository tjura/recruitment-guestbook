FROM php:8.1-fpm
## -- project do not have specified php version so we using lastest one -- ##

## -- install essentials -- ##
RUN apt-get -yq update && apt-get -yqq install \
    ssh\
    libzip-dev\
    zip\
    git\
    curl\
    nano

RUN docker-php-ext-install mysqli pdo pdo_mysql

## -- INSTALL COMPOSER -- ##
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# -- #

WORKDIR /app
