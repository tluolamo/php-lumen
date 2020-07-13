#!/bin/bash

docker run --rm --interactive --tty --volume $PWD:/app composer install

docker-compose up --build -d
#mysql needs a few moment to get going so sleep 20 seconds before executing anything else
sleep 20
docker-compose exec php chown www-data:root ../storage/logs
docker-compose exec php php ../artisan migrate
docker-compose run -w /var/www/html php vendor/bin/phpunit
