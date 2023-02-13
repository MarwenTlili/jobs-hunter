FROM php:7.4-fpm

ENV DEBIAN_FRONTEND="noninteractive"

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    # && pecl install apcu -o -f redis \
    # &&  rm -rf /tmp/pear \
    # && docker-php-ext-enable redis \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/jobshunter

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash

# RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
# RUN mv /usr/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/jobshunter
# RUN chown -R www-data:$(whoami) public/

RUN git config --global user.email "marwentlili@gmail.com" \ 
    && git config --global user.name "marwentlili" \
    && git config --global credential.helper cache
