FROM php:7.4-fpm

RUN docker-php-ext-install pdo pdo_mysql \
&& curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer \

RUN apt-get clean && \
        rm -rf /var/lib/apt/lists/*  /tmp/* /var/tmp/* && \
        rm /var/log/lastlog /var/log/faillog