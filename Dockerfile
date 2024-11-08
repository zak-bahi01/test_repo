FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

WORKDIR /var/www/html

COPY ./app .

RUN echo "DirectoryIndex products.php" >> /etc/apache2/apache2.conf

EXPOSE 80
