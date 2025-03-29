# FROM php:8.3-alpine

# # Install system dependencies
# RUN apk add --no-cache \
#     curl \
#     git \
#     unzip \
#     mariadb-dev \
#     oniguruma-dev \
#     nodejs \
#     npm \
#     autoconf \
#     g++ \
#     make

# # Install PHP extensions for MySQL
# RUN docker-php-ext-install pdo pdo_mysql mbstring

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- \
#     --install-dir=/usr/local/bin --filename=composer

# WORKDIR /app
# COPY . .

# # Install PHP dependencies
# RUN composer install --no-interaction --optimize-autoloader

# # Install Node.js dependencies and build assets
# RUN npm install && npm run build

# EXPOSE 8000
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
FROM php:8.3-alpine

# Install system dependencies
RUN apk add --no-cache \
    curl \
    git \
    unzip \
    mariadb-client \
    mariadb-dev \
    oniguruma-dev \
    nodejs \
    npm \
    autoconf \
    g++ \
    make

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Install Node.js dependencies and build assets
RUN npm install && npm run build

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
