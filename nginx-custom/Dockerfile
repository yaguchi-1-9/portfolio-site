# 公式Nginxイメージをベースにする
FROM nginx:latest

# net-toolsパッケージをインストール
RUN apt-get update && apt-get install -y net-tools && rm -rf /var/lib/apt/lists/*
