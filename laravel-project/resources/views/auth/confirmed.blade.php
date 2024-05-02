<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
</head>

<body>
    <main class="main">
        <div class="main-inner">
            <!-- タイトル -->
            <div class="ttl">
                <h1 class="ttl-top">
                    こちらの内容で登録してよろしいですか？
                </h1>
            </div>

            <!-- 会員登録確認フォーム -->
            <form action="" method="post" class="form">
                @csrf
                <!-- Name -->
                <div class="form-item">
                    <p>ユーザー名：</p>
                    <input type="text" class="input" name="name" value="{{ old('name') }}" readonly>
                </div>
                <!-- Email -->
                <div class="form-item">
                    <p>メールアドレス：</p>
                    <input type="email" class="input" name="email" value="{{ old('email') }}" readonly>
                </div>
                <!-- PS -->
                <div class="form-item">
                    <p>パスワード：</p>
                    <input type="password" class="input" name="password" readonly>
                </div>
                <!-- 送信ボタン -->
                <div class="form-item">
                    <button type="submit" class="button">送信</button>
                </div>
            </form>

        </div>
    </main>

</body>

</html>