# Use PHP 8.3 base image
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

# Install Node.js 18.x (Fix: Hardcoded Debian "bookworm" instead of lsb_release)
RUN mkdir -p /etc/apt/keyrings && \
    curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg && \
    echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_18.x bookworm main" | tee /etc/apt/sources.list.d/nodesource.list && \
    apt-get update && \
    apt-get install -y nodejs && \
    npm install -g npm@latest

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app
COPY . .

# Install Laravel & Vue dependencies
RUN composer install --no-interaction --optimize-autoloader
RUN npm install && npm run build  # Build Vue frontend

# Expose port
EXPOSE 8000

# Start Laravel backend
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
