git pull origin master
docker run --rm -v $(pwd):/app composer install --optimize-autoloader --no-dev
docker exec -it app-recrutation php artisan migrate && docker exec -it app-recrutation php artisan config:cache && docker exec -it app-recrutation php artisan route:cache
docker run --rm -v $(pwd):/app composer dump-autoload
