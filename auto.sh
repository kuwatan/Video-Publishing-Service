#!/bin/sh

echo "webサイト自動追加サービスへようこそ"
echo "追加したいサイト番号を入力"
read name
echo "basic認証を行いますか？ 行う=0 行わない=1"
read bas
echo "プログラムを実行します"

if [ $bas -eq 0 ]; then
	echo "ユーザー名は?"
	read user
	echo "パスワードは?"
	read pas
	htpasswd -b -c /etc/nginx/.htpasswd$name/$user $pas
	mkdir /var/www/html/$name
	sleep 1.5s
	cp /var/www/html/moto/index.html /var/www/html/$name
	echo "サイト番号$nameへの処理が完了しました"
	echo "index.phpとNginxへの書き込みを忘れずに"
elif [ $bas -eq 1 ]; then
	mkdir /var/www/html/$name
        sleep 1.5s
        cp /var/www/html/moto/index.html /var/www/html/$name
        echo "サイト番号$nameへの処理が完了しました"
	echo "index.phpとNginxへの書き込みを忘れずに"
fi
