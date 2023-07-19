# 🐳

## 環境構築

### 1. .envファイルの作成

```
.env.example をコピーして作成しましょう。
コピーして名前を「.env」に変更するだけでokです。
```

### 2. コンテナの立ち上げ

```
make up
```
※ `make` コマンドは学習用に用意したコマンドとなるため、正式な Docker のコマンドではありません。

### 3. ライブラリのインストール

```
//コンテナの中に入る
make bash

//ディレクトリ移動
cd laravel-project

//ライブラリのインストール
composer install
```
※ `make` コマンドは学習用に用意したコマンドとなるため、正式な Docker のコマンドではありません。
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
make stop
```

## その他コマンド

## ページ紹介

php

[localhost:8000](http://localhost:8000)

PHPMyAdmin

[localhost:4040](http://localhost:4040)
