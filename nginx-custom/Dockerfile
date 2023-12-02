# 公式Nginxイメージをベースにする
FROM nginx:latest

# net-toolsパッケージをインストール
RUN apt-get update && apt-get install -y net-tools && rm -rf /var/lib/apt/lists/*

# nginx設定ファイルをコピー
COPY ./default.conf /etc/nginx/conf.d/default.conf

# タイムゾーンデータをDebianイメージからコンテナにコピー
# Debianを選択した理由はイメージサイズが小さく、高い普及度と多くの互換性を持つため
COPY --from=debian:stretch-slim /usr/share/zoneinfo/Asia /usr/share/zoneinfo/Asia
