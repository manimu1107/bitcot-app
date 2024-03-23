# Use the official PHP image from Docker Hub
FROM php:7.4-apache

# Copy the PHP files into the container
COPY . /var/www/html/

# Install mysqli extension
RUN docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli

# Expose port 80
EXPOSE 80

