# Stage 1: Build Node.js assets
FROM node:20-alpine AS node-builder

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

# Stage 2: Build PHP application
FROM php:8.4-fpm-alpine

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    sqlite \
    sqlite-dev \
    oniguruma-dev \
    icu-dev \
    $PHPIZE_DEPS

# Configure and install all PHP extensions
RUN docker-php-ext-configure intl && \
    docker-php-ext-install -j$(nproc) \
    pdo_sqlite \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    xml \
    intl \
    zip \
    opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies - ignore platform reqs as fallback
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-scripts --ignore-platform-req=ext-intl --ignore-platform-req=ext-zip

# Copy application files
COPY . .

# Copy built assets from Node stage
COPY --from=node-builder /app/public/build ./public/build

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Set proper permissions
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache


# Create storage directory and set permissions
RUN mkdir -p /var/www/storage/app && \
    chown -R www-data:www-data /var/www/storage

# Expose port
EXPOSE 8000

# Switch to www-data user
USER www-data

# Run the application using entrypoint script
ENTRYPOINT ["docker-entrypoint.sh"]


