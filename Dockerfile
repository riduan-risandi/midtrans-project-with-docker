 
FROM php:8.1-fpm-alpine
# docker pull php:8.1.20-cli-alpine
# docker pull php:8.1-fpm-alpine

# RUN docker-php-ext-install pdo pdo_mysql

# WORKDIR /var/www/html
# COPY . /var/www/html/


# # # Install Composer 

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

RUN curl --ss https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer

    

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN set -eux 
 

 
 
 