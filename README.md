<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# blog-application

This is a blog application fully written in Laravel.
The website is hosted on https://blogapplication-laravel.000webhostapp.com/
There is a problem with the images because of unability to create a symlink due to free hosting.

## run project:

`docker compose up -d` <br />
`docker-compose-watch`

## Docker compose

`docker compose up -d blogdb` <br />
`docker compose up -d phpmyadmin3`<br />
`docker compose up -d --build blogapp`<br />

## Access database

`docker exec -it blogdb mysql -u root -p`<br />
`GRANT ALL PRIVILEGES ON blogdb.* TO 'admin'@'%';`<br />
`FLUSH PRIVILEGES;`<br />
`CREATE DATABASE blogdb;`<br />
`EXIT;`

## Create model and controller class

`php artisan make:model ModelName -m`
`php artisan make:controller ControllerName -m`

## Migrate database

`docker exec blogapp php artisan migrate`

## Remove containers

`docker compose down -v`
