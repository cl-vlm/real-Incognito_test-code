FROM php:8.1-apache

# PHP에서 MySQL을 사용할 수 있게 모듈 설치 및 활성화
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 소스 코드 복사
COPY . /var/www/html/

# 권한 설정 (로그 파일이나 DB 파일 생성 대비)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
