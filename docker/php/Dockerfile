FROM php:8.3-fpm

# composerインストール
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# 必要なパッケージをインストールと拡張機能の有効化
RUN apt-get update \
    && apt-get install -y \
                git \
                zip \
                unzip \
                libonig-dev \
                libfreetype6-dev \
                libjpeg62-turbo-dev \
                libpng-dev \
                libjpeg-dev \
                libzip-dev \
    && docker-php-ext-install \
                pdo_mysql \
                bcmath \
                gd \
                zip \
    && docker-php-ext-configure gd \
                --with-freetype=/usr/include/

WORKDIR /var/www

COPY ./zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf

# 設定変更の必要がある場合はコメントアウトを外す
# COPY ./php.ini /usr/local/etc/php/php.ini

# test
