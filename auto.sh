#!/bin/sh

echo "webサイト自動追加サービスへようこそ"
echo "追加したいサイト番号を入力"
read name
echo "basic認証を行いますか？ 行う=0 行わない=1"
read bas
echo "プログラムを実行します"

#パスワード有りの方
if [ $bas -eq 0 ]; then
	echo "ユーザー名は?"
	read user
	echo "パスワードは?"
	read pas
	#パスワードハッシュのやつ
	htpasswd -b -c /etc/nginx/.htpasswd$name $user $pas
	#ディレクトリ作成
	mkdir /var/www/html/$name
	sleep 1.5s
	#メインファイルコピー
	cp /var/www/html/moto/index.html /var/www/html/$name
	#パスワードをnginxに設定
	sed -i '126a \        \location '/$name' {\
	auth_basic            "Basic Auth";\
	auth_basic_user_file  "'/etc/nginx/.htpasswd$name'";\
	}
		' /etc/nginx/sites-available/default
	#ホームファイルに新規追加
	sed -i '6a\        \"'$name'" => "'/$name/'",' /var/www/html/index.php
	systemctl reload nginx
	echo "サイト番号$nameへの処理が完了しました"

#パスワード無しの方
elif [ $bas -eq 1 ]; then
	#ディレクトリ作成
	mkdir /var/www/html/$name
        sleep 1.5s
        #メインファイルコピー
	cp /var/www/html/moto/index.html /var/www/html/$name
	#ホームファイルに新規追加
	sed -i '6a\        \"'$name'" => "'/$name/'",' /var/www/html/index.php
	echo "サイト番号$nameへの処理が完了しました"
fi
