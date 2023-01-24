# 🐳

## 環境構築

### 1. .envファイルの作成

### 2. コンテナの立ち上げ

```
docker-compose up -d
```

### 3. 

```
//コンテナの中に入る
docker-compose exec app bash

//ディレクトリ移動
cd laravel-project

//ライブラリのインストール
composer install
```

### 4. APP_KEYの設定

```
//APP_KEYの設定
php artisan key:generate

//コンテナから出る
exit
```

## その他コマンド

## ページ紹介

php

[localhost:8000](http://localhost:8080)

PHPMyAdmin

[localhost:4040](http://localhost:3306)
