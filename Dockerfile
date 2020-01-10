FROM node:latest
FROM composer:latest
FROM php:7.4.1

RUN chown -R laravel:laravel /home/laravel/app

RUN mkdir -p /home/laravel/app/node_modules
RUN mkdir -p /home/laravel/app/vendor

WORKDIR /home/laravel/app

COPY package*.json ./
COPY composer*.json ./

RUN composer install && npm install
RUN composer global require laravel/installer

COPY --chown=laravel:laravel . .

USER laravel

EXPOSE 8080

CMD [ "php artisan serve", "-p 8080" ]
