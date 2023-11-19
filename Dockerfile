FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    autoconf \
    build-essential \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    libmagick++-dev \
    libmagickwand-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    zip \
    unzip \
    zlib1g-dev \
    libmcrypt-dev \
    libpng-dev \
    libzip-dev \
    libsodium-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurando a extensão do GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include/ --enable-gd

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring xml exif pcntl bcmath gd zip sodium intl

RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

WORKDIR /var/www/html