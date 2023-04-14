FROM php:8.1.16-fpm


# Arguments defined in docker-compose.yml
ARG user
ARG uid

ADD ./docker-compose/php/php.ini /usr/local/etc/php/conf.d

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath gd
# Install Postgre PDO
RUN docker-php-ext-install pdo pgsql pdo_pgsql 