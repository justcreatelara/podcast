run the app: composer install
            php artisan serve
            php artisan migrate

db config: DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=podcast

modeling: a podcast has many episodes

guest user can list and show single podcasts and episodes

authenticated user can create/update/delete podcasts and episodes

