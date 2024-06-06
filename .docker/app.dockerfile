FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential libicu-dev libzip-dev libxml2-dev libpng-dev \
    libjpeg62-turbo-dev libfreetype6-dev libonig-dev locales zip \
    unzip jpegoptim optipng pngquant gifsicle vim git curl \
    wget libicu-dev g++ libpq-dev libssl-dev gettext libpng-dev zlib1g-dev \
    librabbitmq-dev pkg-config

RUN docker-php-ext-configure zip

#Xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip pdo mbstring && docker-php-ext-enable zip pdo mbstring

# Install MySQL driver
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Redis
RUN pecl install -o -f redis && docker-php-ext-enable redis

# For RabbitMQ
RUN docker-php-ext-install sockets && docker-php-ext-enable sockets


# Install AMQP for RabbitMQ
RUN pecl install amqp && docker-php-ext-enable amqp

# NetCat для проверки коннекта supervisor и rabbitmq. Не обязательная штука
RUN apt-get update && apt-get install -y netcat-openbsd

# Supervisor
#RUN apt-get update && apt-get install -y supervisor

# Get latest Composer
RUN curl --silent --show-error "https://getcomposer.org/installer" | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www
