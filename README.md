# hargos
## Установка
php artisan voyager:install
php artisan voyager:admin admin@site.com --create
php artisan vendor:publish --provider="TCG\Voyager\VoyagerServiceProvider"
php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravel5"
php artisan migrate
php artisan db:seed --class=VoyagerDatabaseSeeder
php artisan hook:setup
php artisan storage:link
composer dump-autoload