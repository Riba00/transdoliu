#!/bin/bash

apt install -y nano

composer install

npm install
npm run build

chown www-data:www-data -R /var/www/html

php-fpm