# Use official PHP 8.3 CLI image
FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Ensure SQLite database exists
RUN touch database/database.sqlite

# Expose the port that Render provides
EXPOSE 8000

RUN mkdir -p storage/framework/{cache,sessions,views} \
    && chmod -R 775 storage bootstrap/cache

# Start Laravel with migrations
CMD php artisan migrate --force && php -S 0.0.0.0:$PORT -t public
