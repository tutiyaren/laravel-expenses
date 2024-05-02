@extends('top.header')

@section('content')

<div class="main">
    <!-- 支出登録ページタイトル -->
    <div>
        <h1>支出登録</h1>
    </div>
    <!-- フォーム -->
    <form action="" method="post">
        @csrf
        <div>
            <label for="spendingName">支出名</label>
            <input type="text" id="spendingName" name="" placeholder="支出名" value="">
        </div>
        <div>
            <label for="categoryName">カテゴリー : </label>
            <select name="" id="categoryName">
                <option value="">バイク</option>
            </select>
            <a href="{{ route('category.index') }}">カテゴリ一覧へ</a>
        </div>
        <div>
            <label for="spendingMoney">金額</label>
            <input type="number" id="spendingMoney" name="" placeholder="金額" value="">
            <span>円</span>
        </div>
        <div>
            <label for="spendingDate">日付</label>
            <input type="date" id="spendingDate" name="" value="">
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('spending.index') }}">戻る</a>
    </div>
</div>

@endsection