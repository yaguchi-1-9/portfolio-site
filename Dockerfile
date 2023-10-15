# PHP 8.1の基本イメージを使用
FROM php:8.1-fpm-buster

# composer.lock と composer.json をコピー
COPY composer.lock composer.json /var/www/

# 他の必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    procps \
    nginx \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    net-tools

# キャッシュクリア
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ワーキングディレクトリの設定
WORKDIR /var/www

# ホストのプロジェクトファイルをコンテナにコピー
COPY . /var/www

# Composerの依存関係のインストール
RUN composer install
