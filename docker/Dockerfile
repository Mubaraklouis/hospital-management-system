# ==============================
# 1️⃣ Backend Stage - Install PHP & Laravel
# ==============================
FROM php:8.3 AS backend

# Install system dependencies
RUN apt-get update -y && \
    apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    ca-certificates \
    gnupg \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql bcmath intl zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY composer.json composer.lock ./

# Set permissions before installing
RUN chmod -R 777 /app/storage /app/bootstrap/cache

# Install Laravel dependencies
RUN composer clear-cache && php -d memory_limit=-1 /usr/local/bin/composer install --no-interaction --optimize-autoloader

# Copy Laravel app files
COPY . .
RUN php artisan ziggy:generate  # Generate Ziggy routes

# ==============================
# 2️⃣ Frontend Stage - Build Vue App
# ==============================
FROM node:18 AS frontend

WORKDIR /app
COPY --from=backend /app . 
RUN npm install && npm run build  # Build Vue frontend

# ==============================
# 3️⃣ Final Stage - Serve Laravel
# ==============================
FROM php:8.3

WORKDIR /app
COPY --from=backend /app .
COPY --from=frontend /app/public/js public/js

# Expose port
EXPOSE 8000

# Start Laravel backend
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
