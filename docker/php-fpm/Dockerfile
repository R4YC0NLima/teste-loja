FROM jpaulolxm/php-8-fpm:1.0.0

# Arguments defined in docker-compose.yml
ARG user
ARG uid

COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html

USER $user
