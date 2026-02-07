# Stage 1: Build Node.js assets
FROM node:20-alpine AS node-builder

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

# Stage 2: Build PHP application with Node.js for development
FROM node:20-alpine

# Install PHP and dependencies
RUN apk add --no-cache \
    php \
    php-phar \
    php-json \
    php-pdo \
    php-pdo_sqlite \
    php-pdo_mysql \
    php-mbstring \
    php-exif \
    php-pcntl \
    php-bcmath \
    php-gd \
    php-xml \
    php-intl \
    php-zip \
    php-opcache \
    php-ctype \
    php-curl \
    php-fileinfo \
    php-cgi \
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
    icu-dev

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-scripts --ignore-platform-req=ext-intl --ignore-platform-req=ext-zip || true

# Copy application files
COPY . .

# Copy built assets from Node stage (override any existing build dir)
COPY --from=node-builder /app/public/build ./public/build

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Set proper permissions
RUN mkdir -p /var/www/storage/app /var/www/bootstrap/cache && \
    chmod -R 755 /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port
EXPOSE 8000

# Run the application using entrypoint script
ENTRYPOINT ["docker-entrypoint.sh"]
