#!/usr/bin/env sh

echo 'Installing new dependencies...'
docker exec -it  crud-php-fpm bash -c "composer install"
echo 'Clearing cache...'
docker exec -it  crud-php-fpm bash -c "php artisan cache:clear"
echo 'Clearing config...'
docker exec -it  crud-php-fpm bash -c "php artisan config:clear"
echo 'Creating new migrations...'
docker exec -it  crud-php-fpm bash -c "php artisan migrate"
