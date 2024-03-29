#!/bin/sh

# 環境変数PORTを使用して、Nginxの設定を動的に書き換える
sed -i -e "s/listen 80/listen $PORT/g" /etc/nginx/conf.d/default.conf

# その後、Nginxと他のサービスを起動するコマンドを記述
nginx -g 'daemon off;'
