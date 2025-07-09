# FROM php:8.2-apache

# RUN docker-php-ext-install pdo pdo_mysql mysqli

# COPY . /var/www/html/

# EXPOSE 80
# FROM php:7.4-apache
# COPY . /var/www/html/

FROM php:7.4-apache

# Install ekstensi mysqli dan driver mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Salin semua file project ke direktori web server
COPY . /var/www/html/
