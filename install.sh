#!/bin/bash

docker run --rm --interactive --tty --volume $PWD:/app composer install

docker-compose run -w /var/www/html php php artisan migrate
docker-compose run -w /var/www/html php vendor/bin/phpunit
