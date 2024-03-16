FROM php:8.1-fpm


RUN apk update && apk add --no-cache supervisor

RUN mkdir -p "/etc/supervisor/logs"


COPY /etc/supervisor/supervisord.conf /etc/supervisor/supervisord.conf

CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]
