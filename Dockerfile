FROM php:8.1-apache

# PostgreSQL 및 MySQL 통신을 위한 라이브러리 설치
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mysqli

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
