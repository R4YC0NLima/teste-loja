FROM jpaulolxm/php-8-fpm:1.0.0

WORKDIR /var/www/html

# CRON
run apk add --update apk-cron
# Dependecias para lib GD

RUN apk add --update libpng-dev
RUN apk add --update libjpeg-turbo-dev
RUN apk add --update freetype-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install -j$(nproc) gd

# Dependecias para lib ZIP
RUN apk add --update libzip-dev

# Instalar Extenções
#RUN docker-php-ext-install gd

RUN docker-php-ext-install zip

RUN apk add --update php-curl
RUN apk add --update php-mbstring
RUN apk add --update php-xml
RUN apk add --update php-json
RUN apk add --update php-intl
RUN apk add --update mysql-client

RUN docker-php-ext-install calendar
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install pdo_mysql
# Install supervisor
RUN apk add --update supervisor
# Install Dockerize
RUN apk add --no-cache openssl

COPY php.ini /usr/local/etc/php/

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm -rf /var/cache/apk/*

#CHECK SUPORTE LIB GD PNG Support, JPEG Support]
#CMD php -r 'print_r(gd_info());'
