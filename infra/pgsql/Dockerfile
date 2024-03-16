FROM postgres:14.1


RUN apt-get update \
  && apt-get install -y


RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql zip bcmath gd \

COPY script/initdb.sh /docker-entrypoint-initdb.d/
