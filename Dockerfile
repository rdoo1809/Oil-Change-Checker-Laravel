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

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Ensure SQLite database exists
RUN touch database/database.sqlite

# Expose the port
EXPOSE 8000

# Start Laravel with migrations
CMD php artisan migrate --force && php -S 0.0.0.0:$PORT -t public
