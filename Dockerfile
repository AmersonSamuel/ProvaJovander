
FROM php:7.4-apache

RUN apt-get clean
RUN apt-get update && apt-get install -y \
    git \
    mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN git clone https://github.com/AmersonSamuel/ProvaJovander.git


COPY create_database.sql /docker-entrypoint-initdb.d/

ENV DB_HOST=localhost
ENV DB_PORT=3306
ENV DB_NAME=banco
ENV DB_USER=sa
ENV DB_PASSWORD=root

EXPOSE 80

CMD ["apache2-foreground"]