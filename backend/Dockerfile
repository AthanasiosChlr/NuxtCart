# Set the base image to PHP 8.4 with FPM
FROM php:8.4-fpm

# Set working directory inside the container
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libmariadb-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the existing application directory to the container's working directory
COPY . .

# Install the application's dependencies
RUN composer install

# Expose the port the app will run on
EXPOSE 8000

# Run the PHP-FPM server
CMD ["php-fpm"]
