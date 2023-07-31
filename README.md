# Vue + PHP + docker app
![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/2f539fc0-7637-47f1-9286-2be4d81639a2)

A fullstack vue + vanilla PHP app containerised with docker.

## How to run the app
1. Make sure you have [docker desktop](https://www.docker.com/products/docker-desktop/) installed
2. Clone this repository into your preferred folder
3. `cd` into your cloned repository
4. Open a terminal within this repository and run `docker-compose up -d`
5. Visit `http://localhost:5002/`

#### Adding employees:
1. Click the `Import CSV` button to choose a csv file 
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/8175b112-b79c-412f-8084-901b5aebea58)
2. Click the green button to add employees
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/9865ac3c-aed3-45f8-ae75-e30ff560701e)
     
#### Editing employee email:
1. Click the pencil button
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/fb347780-d59d-4dbe-b658-b18d64b062da)
2. Edit the email and then click the check button to save the email.
   - ![image](https://github.com/ricjohn-acosta/vue-php-docker-app/assets/41725332/41d19d9c-d8b5-4fd9-b40a-e518c75b63f9)

## How to run tests
1. Open a terminal within this repository and run `docker exec -it vue-php-docker-app-php-1 php /var/www/vendor/bin/phpunit html/tests`

## How to restart the app incase something funky is happening
1. Run `docker-compose down` using a terminal within the cloned repository
2. Run `docker image prune -a`
3. Run `docker volume prune -a`

Notes:
- If the frontend app errors on startup just wait for it as the db container may still be preparing for connection.
- If you want to check out the database visit `http://localhost:5002/` with `username: root` and `pw: example`
