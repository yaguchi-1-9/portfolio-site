# ベースイメージとして公式のPHPイメージを使用
FROM php:8.1-fpm

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# PHP拡張モジュールのインストール
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリケーションディレクトリの作成
WORKDIR /var/www

# ホストのアプリケーションファイルをコンテナにコピー
COPY . /var/www

# Composerで依存関係をインストール
RUN composer install

# PHP-FPMの起動
CMD ["php-fpm"]
