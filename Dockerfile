FROM nginx:latest

RUN apt update && apt upgrade -y
RUN apt install -y php8.2-fpm php8.2-mysqli
COPY ./php/php-fpm.conf /etc/php/8.2/fpm/pool.d/www.conf
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./public_html /var/www/html

EXPOSE 80

CMD service php8.2-fpm start && nginx -g 'daemon off;'