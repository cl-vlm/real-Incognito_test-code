FROM php:8.1-apache

# PostgreSQL 접속에 필요한 라이브러리 설치 및 확장 모듈 활성화
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-enable pdo_pgsql

# 소스 코드 복사 및 권한 부여
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
