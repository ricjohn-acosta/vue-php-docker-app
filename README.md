# Vue + PHP + docker app
![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/c6b7e316-0cea-4df1-9f30-df0c833144b0)

A fullstack vue + PHP app containerised with docker.

## How to run the app
1. Make sure you have [docker desktop](https://www.docker.com/products/docker-desktop/) installed
2. Clone this repository into your preferred folder
3. `cd` into your cloned repository
4. Open a terminal within this repository and run `docker-compose up -d`
5. Visit `http://localhost:5002/`

### - Adding employees:
1. Click the `Import CSV` button
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/41ea450e-5f14-4ee0-a73c-0d73ac638de4)
2. Click the green button to add employees
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/5574ecc0-169b-4163-9bb8-72eb317ed0cc)

### - Editing employee email:
1. Click the pencil button
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/a0c8046e-06c7-4fc6-980b-e599a8a66829)
2. Edit the email and then click the check button to save the email.
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/a3eee5d9-525e-4323-a106-5952b67e508d)

## How to run tests
1. Open a terminal within this repository and run `docker exec -it vue-php-docker-app-php-1 php /var/www/vendor/bin/phpunit html/tests`

## How to restart the app incase something funky is happening
1. Run `docker-compose down` using a terminal within the cloned repository
2. Run `docker image prune -a`
3. Run `docker volume prune -a`

Notes:
- If the frontend app errors on startup just wait for it as the db container may still preparing for connection.
- If you want to check out the database visit `http://localhost:5002/` with `username: root` and `pw: example`
