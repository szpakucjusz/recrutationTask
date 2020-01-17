git pull origin master
docker run --rm -v $(pwd):/app-recrutation composer install
docker exec -it app-recrutation php artisan migrate && docker exec -it app-recrutation php artisan config:cache && docker exec -it app-recrutation php artisan route:cache
docker run --rm -v $(pwd):/app-recrutation dump-autoload
