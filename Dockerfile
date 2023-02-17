FROM php:7.4-apache

# Install any necessary packages
RUN apt-get update && \
    apt-get install -y \
        vim \
        git \
        zip \
        unzip \
        libzip-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev

# Install any necessary PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd zip mysqli pdo_mysql

# Set up the Apache web server
RUN a2enmod rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /var/www/html

# Copy the PHP application files
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Expose the port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
