FROM php:8.1-apache

# 1. PostgreSQL 연결을 위한 시스템 라이브러리 설치
# 2. PHP 확장 모듈(pdo, pdo_pgsql, mysqli) 설치 및 활성화
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mysqli \
    && docker-php-ext-enable pdo_pgsql

# 소스 코드 전체 복사
COPY . /var/www/html/

# 서버 권한 설정
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
