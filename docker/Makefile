# コンテナ起動
up:
	docker compose up -d

# コンテナ停止
down:
	docker compose down

# コンテナログイン(laravel)
php-bash:
	docker compose exec php bash

# コンテナログイン(nginx)
nginx-bash:
	docker compose exec nginx bash

# コンテナログイン(mysql)
mysql-bash:
	docker compose exec mysql bash

# git clone
clone:
	docker compose up -d
	docker compose exec php composer install
	docker compose exec php cp .env.example .env
	docker compose exec php php artisan key:generate
	docker compose exec php php artisan storage:link
	docker compose exec php chmod -R 777 storage bootstrap/cache
	docker compose exec php php artisan migrate:fresh --seed

# composer install
composer-install:
	docker compose exec php composer install

# laravelキャッシュクリア
clear:
	docker compose exec php php artisan cache:clear
	docker compose exec php php artisan config:clear
	docker compose exec php php artisan route:clear
	docker compose exec php php artisan view:clear

# migrate
migrate:
	docker compose exec php php artisan migrate

# migrate:fresh + seed
fresh:
	docker compose exec php php artisan migrate:fresh --seed

# php-cs-fixer + stan
check:
	docker compose exec php ./vendor/bin/php-cs-fixer fix
	docker compose exec php ./vendor/bin/phpstan analyse --memory-limit=2G
