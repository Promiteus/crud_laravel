FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        git \
        curl \
        wget \
        libpq-dev \
        libfreetype6-dev \
        nano \
        zip \
        unzip \
        locales \
        libmcrypt-dev \
        libpng-dev zlib1g-dev libicu-dev g++ libmagickwand-dev --no-install-recommends libxml2-dev

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql

#ADD /c/php7/php.ini /usr/local/etc/php/php.ini


WORKDIR /var/www
    





