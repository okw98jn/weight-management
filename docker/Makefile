# コンテナ起動
up:
	docker compose up -d

# コンテナ停止
down:
	docker compose down

# コンテナログイン(laravel)
php-bash:
	docker compose exec weight-mg-app bash

# コンテナログイン(nginx)
nginx-bash:
	docker compose exec weight-mg-web bash

# コンテナログイン(mysql)
mysql-bash:
	docker compose exec weight-mg-db bash

# git clone
clone:
	docker compose up -d
	docker compose exec weight-mg-app composer install
	docker compose exec weight-mg-app cp .env.example .env
	docker compose exec pweight-mg-apphp php artisan key:generate
	docker compose exec weight-mg-app php artisan storage:link
	docker compose exec pweight-mg-apphp chmod -R 777 storage bootstrap/cache
	docker compose exec weight-mg-app php artisan migrate:fresh --seed

# composer install
composer-install:
	docker compose exec weight-mg-app composer install

# laravelキャッシュクリア
clear:
	docker compose exec weight-mg-app php artisan cache:clear
	docker compose exec weight-mg-app php artisan config:clear
	docker compose exec phweight-mg-appp php artisan route:clear
	docker compose exec weight-mg-app php artisan view:clear

# migrate
migrate:
	docker compose exec weight-mg-app php artisan migrate

# migrate:fresh + seed
fresh:
	docker compose exec weight-mg-app php artisan migrate:fresh --seed

# php-cs-fixer + stan
check:
	docker compose exec weight-mg-app ./vendor/bin/php-cs-fixer fix
	docker compose exec weight-mg-app ./vendor/bin/phpstan analyse --memory-limit=2G
