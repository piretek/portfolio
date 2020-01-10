FROM node:latest
FROM composer:latest
FROM php:7.4.1

RUN chown -R laravel:laravel /home/laravel/app

WORKDIR /home/laravel/app

COPY --chown=laravel:laravel . .

RUN composer install && npm install
RUN composer global require laravel/installer

RUN php -r "file_exists('.env') || copy('.env.example', '.env');"

RUN php artisan key:generate
RUN touch database/database.sqlite
RUN php artisan storage:link
RUN php artisan migrate

USER laravel

EXPOSE 8080

CMD [ "php artisan serve", "-p 8080" ]
