FROM php:8.1-apache
# SQLite 권한 설정
RUN chown -R www-data:www-data /var/www/html
COPY . /var/www/html/
EXPOSE 80
