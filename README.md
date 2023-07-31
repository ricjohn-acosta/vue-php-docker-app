# Vue + PHP + docker app
A fullstack vue + PHP app containerised with docker.

## How to run app
1. Make sure you have [docker desktop](https://www.docker.com/products/docker-desktop/) installed
2. Clone this repository into your preferred folder
3. `cd` into your cloned repository
4. Open a terminal within this repository and run `docker-compose up -d`

## How to run tests
1. Open a terminal within this repository and run `docker exec -it vue-php-docker-app-php-1 php /var/www/vendor/bin/phpunit html/tests`
