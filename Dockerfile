FROM php:8.1-fpm-bullseye

# Arguments
ARG user=projetoroot
ARG uid=1000

# Install system dependencies
#RUN apt update && apt install -y git curl libpng-dev libonig-dev libxml2-dev libicu-dev wget zip unzip zlib1g-dev g++
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    wget \
    zip \
    unzip \
    zlib1g-dev \
    g++

# Clear cache
RUN apt clean 
#&& rm -rf /var/lib/apt/lists/*

#RUN rm /etc/apt/preferences.d/no-debian-php

# Install PHP extensions
#RUN docker-php-ext-install mbstring pdo pdo_mysql exif pcntl bcmath gd sockets
#RUN pecl install pdo_mysql mbstring exif pcntl bcmath gd sockets
# RUN docker-php-ext-install mbstring \
#     && docker-php-ext-install pdo \
#     && docker-php-ext-install pdo_mysql \
#     && docker-php-ext-install exif \
#     && docker-php-ext-install pcntl \
#     && docker-php-ext-install bcmath \
#     && docker-php-ext-install gd \
#     && docker-php-ext-install sockets

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions mbstring       
RUN install-php-extensions pdo
RUN install-php-extensions exif
RUN install-php-extensions pcntl
RUN install-php-extensions bcmath
RUN install-php-extensions gd
RUN install-php-extensions sockets
RUN install-php-extensions pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user