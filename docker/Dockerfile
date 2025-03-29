FROM php:8.3-alpine

# Install system dependencies
RUN apk add --no-cache \
    curl \
    git \
    unzip \
    postgresql-dev \
    nodejs \
    npm \
    # Required for some npm packages
    python3 \
    make \
    g++

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Install Node.js dependencies and build assets
RUN npm install && npm run build

# Configure PHP for production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
