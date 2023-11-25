FROM php:7.4-fpm

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Composer のインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ワーキングディレクトリの設定
WORKDIR /var/www

# Laravel アプリケーションのコピー
COPY . /var/www

# Composer dependencies のインストール
RUN composer install --optimize-autoloader --no-dev

# 権限の設定
RUN chown -R www-data:www-data /var/www

# ポートの公開
EXPOSE 9000

# PHP-FPM の実行
CMD ["php-fpm"]
