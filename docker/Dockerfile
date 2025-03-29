# ==============================
# 1️⃣ Build Vue Frontend using Node.js
# ==============================
FROM node:18 AS frontend

WORKDIR /app
COPY . .
RUN npm install && npm run build

# ==============================
# 2️⃣ Set Up PHP Backend
# ==============================
FROM php:8.3

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
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app
COPY --from=frontend /app .  

# Install Laravel dependencies
RUN composer install --no-interaction --optimize-autoloader

# Expose port
EXPOSE 8000

# Start Laravel backend
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
