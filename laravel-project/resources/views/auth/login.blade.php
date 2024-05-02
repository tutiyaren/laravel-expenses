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
                    ログイン
                </h1>
            </div>

            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- ログインフォーム -->
            <form action="" method="post" class="form">
                @csrf
                <!-- Email -->
                <div class="form-item">
                    <input type="email" class="input" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <!-- PS -->
                <div class="form-item">
                    <input type="password" class="input" name="password" placeholder="Password" required>
                </div>
                <!-- ログインボタン -->
                <div class="form-item">
                    <button type="submit" class="button">ログイン</button>
                </div>
            </form>

            <!-- ログイン画面へリンク -->
            <div class="link">
                <a href="{{ route('register') }}" class="link-register">アカウントを作る</a>
            </div>

        </div>
    </main>

</body>

</html>