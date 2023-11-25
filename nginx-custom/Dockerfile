# 公式Nginxイメージをベースにする
FROM nginx:latest

# net-toolsパッケージをインストール
RUN apt-get update && apt-get install -y net-tools && rm -rf /var/lib/apt/lists/*

# nginx設定ファイルをコピー
COPY ./default.conf /etc/nginx/conf.d/default.conf

# スタートアップスクリプトをコピー
# COPY ./start-nginx.sh /usr/local/bin/start-nginx.sh

# スクリプトを実行可能にする
# RUN chmod +x /usr/local/bin/start-nginx.sh

# スタートアップスクリプトを実行
# CMD ["/usr/local/bin/start-nginx.sh"]
