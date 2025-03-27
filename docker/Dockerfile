# Stage 1: Build PHP dependencies
FROM composer:2.7 as php-builder

WORKDIR /app
COPY . .
RUN composer install --no-dev --no-interaction --optimize-autoloader --ignore-platform-reqs

# Stage 2: Build Node dependencies
FROM node:18 as node-builder

WORKDIR /app
COPY --from=php-builder /app /app
COPY package*.json ./
RUN npm ci --silent
COPY resources/ ./resources/
COPY vite.config.js ./
RUN npm run build

# Stage 3: Production image
FROM php:8.3-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_mysql \
    pdo_pgsql \
    bcmath \
    opcache \
    gd \
    zip \
    && rm -rf /var/cache/apk/*

# Configure PHP
COPY docker/production/php.ini /usr/local/etc/php/conf.d/php.ini

# Configure Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy application files
COPY --chown=www-data:www-data --from=php-builder /app /var/www/html
COPY --chown=www-data:www-data --from=node-builder /app/public/build /var/www/html/public/build

# Set up permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Setup entrypoint
COPY docker/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
