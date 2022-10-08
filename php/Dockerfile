FROM php:8.1-apache
RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql mysqli 

RUN a2enmod rewrite
COPY hotsite.apache.conf /usr/local/apache2/conf/hotsite.apache.conf

RUN echo "Include /usr/local/apache2/conf/hotsite.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf