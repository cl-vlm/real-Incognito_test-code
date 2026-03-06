FROM php:8.1-apache

# MySQL 연결을 위한 mysqli 확장 모듈 설치
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# (선택 사항) 만약 나중에 SQLite도 병행해서 쓰실 거라면 아래 줄을 사용하세요
# RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install mysqli pdo pdo_pgsql

COPY . /var/www/html/

# Apache 권한 설정
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
