## Project setup

Idea is to start a PHP project from scratch which can be evolved into full fledge production ready php web site.

Based on popularity(and liking) I have selected Laravel framework for developing a PHP project. Therefore the first step is creating skeleton of a laravel project. 
[Laravel documentation](https://laravel.com/docs/4.2/installation) guides us through that using `sail` however there are lot of unnecessary components. In fact `sail` is not necessary to develop a minimal php-laravel project. Another option presented is with `composer` which is good however I would like to go with a manual way of downloading a basic structure from their [github page](https://github.com/laravel/laravel). Follwing are the commands I ran to run this project with *local web server*
```
# Since I have github CLI installed, download the laravel project using it
gh repo clone laravel/laravel

# Remove unnecessary folders
rm -rf .git
rm -rf .github
rm -rf CHANGELOG.md

# Run composer to install dependancies
composer update

# In sail installation .env.example is automatically copied to .env
# In our case do it manually to set up .env file
cp .env.example .env

# Run local web server 
php artisan serve
```

After visiting http://localhost/ we get this error "No application encryption key has been specified." This is because a downloaded project does not have APP_KEY set up for the project. Everytime we download a laravel project we need to generate APP_KEY by running 
```
php artisan key:generate
```
this generates a key and add it to the .env file

## Adding Dockerfile

It is good that php-laravel project is up and running locally but these days eveything needs to be dockerized. Therefore, let's create a Dockerfile to run this project in a docker container.
Most of the instructions written in Dockerfile are explained in comment there.

EDIT
There are 2 containers, one for web server and other for database. To manage them easily, we are using docker compose.
To make the project up and running follow these steps 
```
# copy .env.localdev into .env. This file has docker related configurations
ln -s .env.localdev .env

# UP; this will create 2 container services 
docker-compoes up -d

# Create user
docker-compose exec web php artisan migrate

# insert data into users table
```

## Build image and run a individual containers
```
docker build -t php_image <path to web server docker file>
docker run -d -p 8000:80 --name php_container php_image

docker build -t mysql_host_image <path to mysql docker file>
docker run -d --name mysql_host_container mysql_host_image
```



