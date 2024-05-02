@extends('top.header')

@section('content')

<div class="main">
    <!-- カテゴリ追加ページタイトル -->
    <div class="ttl">
        <h1>カテゴリ追加</h1>
    </div>
    <!-- フォーム -->
    <form action="" method="post">
        @csrf
        <label for="categoryName">カテゴリ名 : </label>
        <input type="text" id="categoryName" name="" value="" placeholder="カテゴリ名">
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('category.index') }}">戻る</a>
    </div>
</div>

@endsection