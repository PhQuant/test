# install
PHP_Version -> 8.1

composer install
php artisan migrate
php artisan db:seed
php artisan storage:link
npm install && npm run dev
php artisan serve

# Docker variant
docker-compose up -d
docker-compose php bash
composer install
php artisan migrate
php artisan db:seed
php artisan storage:link


# Admin credentials

test@example.com
12345