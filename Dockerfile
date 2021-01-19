FROM php:7.1-apache
RUN apt-get update -y &&  apt-get upgrade -y 
RUN apt-get install -y zlib1g-dev libicu-dev libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev libpng-dev g++ \
&& docker-php-ext-install pdo pdo_mysql zip \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl \
&& docker-php-ext-install -j$(nproc) iconv mcrypt \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd
RUN echo "America/Guayaquil" > /etc/timezone && dpkg-reconfigure -f noninteractive tzdata
RUN a2enmod ssl