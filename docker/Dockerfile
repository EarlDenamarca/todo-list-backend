FROM php:8.1

RUN apt-get update && apt-get install -y

RUN apt-get install zip -y

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - &&apt-get install -y nodejs

WORKDIR /var/www/html

ENTRYPOINT [ "docker/entrypoint.sh" ]