<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
</head>

<body>

    <header class="header">
        <div class="header-inner">
            <div class="link">
                <a href="{{ route('index') }}" class="link-home">HOME</a>
            </div>
            <div class="link">
                <a href="{{ route('income.index') }}" class="link-income">収入TOP</a>
            </div>
            <div class="link">
                <a href="{{ route('spending.index') }}" class="link-spending">支出TOP</a>
            </div>
            <form action="" method="post" class="form">
                @csrf
                <button type="submit" class="form-logout">ログアウト</button>
            </form>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

</body>

</html>