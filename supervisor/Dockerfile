FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www


RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql zip bcmath gd

RUN apk update && apk add --no-cache supervisor

RUN mkdir -p "/etc/supervisor/logs"


COPY /etc/supervisor/supervisord.conf /etc/supervisor/supervisord.conf

CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]
