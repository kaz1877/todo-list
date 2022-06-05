FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

# 修正箇所
RUN apt update \
  && apt install -y default-mysql-client \
  && docker-php-ext-install pdo_mysql \
RUN apt-get update && apt-get install -y locales  
RUN sed -i -E 's/# (ja\_JP.UTF-8)/\\1/' /etc/locale.gen && locale-gen  
ENV LANG ja\_JP.UTF-8

WORKDIR /var/www

