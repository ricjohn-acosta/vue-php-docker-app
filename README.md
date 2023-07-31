# Vue + PHP + docker app
A fullstack vue + PHP app containerised with docker.

## How to run app
1. Make sure you have [docker desktop](https://www.docker.com/products/docker-desktop/) installed
2. Clone this repository into your preferred folder
3. `cd` into your cloned repository
4. Open a terminal within this repository and run `docker-compose up -d`
5. Visit `http://localhost:5002/`

## How to run tests
1. Open a terminal within this repository and run `docker exec -it vue-php-docker-app-php-1 php /var/www/vendor/bin/phpunit html/tests`

## How to restart the app incase something funky is happening
1. Run `docker-compose down` using a terminal within the cloned repository
2. Run `docker image prune -a`
3. Run `docker volume prune -a`

Notes:
- If the frontend app errors on startup just wait for it as the db container may still preparing for connection.
- If you want to check out the database visit `http://localhost:5002/` with `username: root` and `pw: example`
