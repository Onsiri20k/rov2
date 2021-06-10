### esports.rov.in.th

### Usage

1. cd to project folder
2. Create docker containers run
   `docker-compose up -d`
3. After all containers done then run
   `docker exec -it esports_rov_in_th_web /bin/bash -c "cd /var/www/esports.rov.in.th/html && yarn install && yarn start"`
   To exec to web container and then cd to frontend path for run

4. Setup backend service and data

    ```
    docker exec -it esports_rov_in_th_web /bin/bash
    cd /var/www/esports.rov.in.th/api
    composer update
    cp .env.example .env
    php artisan key:generate

    cd /var/www/esports.rov.in.th/admin
    composer update
    cp .env.example .env
    php artisan key:generate
    ```

5. Setup your hosts file with **test.esports.rov.in.th**, **test.esports.rov.in.th** and **admin.esports.rov.in.th**

---

**Note**
_Command for monitor that yarn command is done or not_
`docker logs esports_rov_in_th_web --follow`
