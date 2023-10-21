#!/bin/bash

# Nginxをバックグラウンドで起動
nginx

# PHP-FPMをフォアグラウンドで起動
exec php-fpm
