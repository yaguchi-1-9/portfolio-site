# 公式Nginxイメージをベースにする
FROM nginx:latest

# net-toolsパッケージをインストール
RUN apt-get update && apt-get install -y net-tools && rm -rf /var/lib/apt/lists/*

# nginxファイルをコピー
COPY ./default.conf /etc/nginx/conf.d/default.conf
