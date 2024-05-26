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

# MPM設定の修正: preforkを有効にし、他のMPMを無効にする
RUN a2dismod mpm_event mpm_worker && a2enmod mpm_prefork

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# アプリケーションディレクトリの作成
WORKDIR /var/www/html

# ホストのアプリケーションファイルをコンテナにコピー
COPY . /var/www/html

# Composerで依存関係をインストール
RUN composer install --no-dev --optimize-autoloader

# カスタムApache設定ファイルを配置
COPY ./apache2.conf /etc/apache2/sites-available/000-custom.conf

# 不要なデフォルト設定を無効にする
RUN a2dissite 000-default.conf

# カスタム設定を有効にする
RUN a2ensite 000-custom.conf

# ポート80を公開
EXPOSE 80

# コンテナ起動時にApacheをフォアグラウンドで実行
CMD ["apache2-foreground"]
