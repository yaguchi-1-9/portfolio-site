#!/bin/bash

# パーミッションの調整
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# データベースマイグレーションの実行
php artisan migrate --force
