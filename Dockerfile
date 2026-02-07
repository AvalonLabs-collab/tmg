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
    zip \
    unzip \
    git \
    curl \
    sqlite \
    oniguruma-dev \
    $PHPIZE_DEPS

# Install PHP extensions required by Laravel + packages
RUN apk add --no-cache \
        icu-dev \
        libzip-dev \
        zlib-dev \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        xml \
        intl \
        zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-scripts

# Copy application files
COPY . .

# Copy built assets from Node stage
COPY --from=node-builder /app/public/build ./public/build

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

# Run the application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
