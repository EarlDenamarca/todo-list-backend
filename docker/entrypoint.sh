#!/bin/sh

if [ ! -f 'vendor/autoload.php' ]; then
    composer install
fi

# npm install -g laravel-echo-server
# laravel-echo-server start
php artisan serve --host=0.0.0.0