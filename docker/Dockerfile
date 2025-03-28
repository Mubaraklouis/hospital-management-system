# Build stage for frontend assets
FROM node:18 AS node-build
WORKDIR /app
COPY package*.json .
RUN npm install
COPY . .
RUN npm run build

# Production stage
FROM php:8.3-cli-alpine
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    libzip-dev \
    zip \
    unzip \
    bash

# Install PHP extensions
RUN docker-php-ext-install zip pcntl

# Configure PHP
RUN mkdir -p /usr/local/etc/php/conf.d
COPY docker/php/conf.d/custom.ini /usr/local/etc/php/conf.d/

# Create entrypoint
COPY docker/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Copy application files
COPY --from=node-build /app/public/build/ public/build/
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 8000
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
