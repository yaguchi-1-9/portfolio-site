# ベースイメージとして公式のPHPイメージを使用
FROM php:8.3-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# PHP拡張モジュールのインストール
RUN docker-php-ext-install pdo_mysql

# Apacheのmod_rewriteを有効にする
RUN a2enmod rewrite

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリケーションディレクトリの作成
WORKDIR /var/www/html

# ホストのアプリケーションファイルをコンテナにコピー
COPY . /var/www/html

# Composerで依存関係をインストール
RUN composer install --no-dev --optimize-autoloader

# ポート80を公開
EXPOSE 80

# コンテナ起動時にApacheをフォアグラウンドで実行
CMD ["apache2-foreground"]
