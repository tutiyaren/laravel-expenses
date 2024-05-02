@extends('top.header')

@section('content')

<div class="main">
    <!-- カテゴリ編集ページタイトル-->
    <div>
        <h1>編集</h1>
    </div>
    <!-- フォーム -->
    <form action="" method="post">
        @method('put')
        @csrf
        <label for="categoryName">カテゴリ名 : </label>
        <input type="text" id="categoryName" name="" value="" placeholder="カテゴリ名">
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</div>

@endsection