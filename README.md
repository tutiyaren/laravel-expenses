# 🐳

## 環境構築

### 1. .envファイルの作成

```
.env.example をコピーして作成しましょう。
コピーして名前を「.env」に変更するだけでokです。
```

### 2. コンテナの立ち上げ

```
docker-compose up -d
```

### 3. ライブラリのインストール

```
//コンテナの中に入る
docker-compose exec app bash

//ディレクトリ移動
cd laravel-project

//ライブラリのインストール
composer install
```
<img width="612" alt="5dd5a4b493d235b49129ba1caeab1a49" src="https://user-images.githubusercontent.com/52444199/233876644-2835aa75-9ae2-4ecf-a4cc-b302dc82f4c8.png">

### 4. APP_KEYの設定

```
//APP_KEYの設定
php artisan key:generate
```
### 5. コンテナから出る

```
exit
```

### 6. Dockerコンテナの停止

```
docker-compose stop
```

## その他コマンド

## ページ紹介

php

[localhost:8000](http://localhost:8000)

PHPMyAdmin

[localhost:4040](http://localhost:4040)
