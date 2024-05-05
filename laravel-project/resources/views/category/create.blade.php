@extends('top.header')

@section('content')

<div class="main">
    <!-- カテゴリ追加ページタイトル -->
    <div class="ttl">
        <h1>カテゴリ追加</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <label for="categoryName">カテゴリ名 : </label>
        <input type="text" id="categoryName" name="name" value="{{ old('name') }}" placeholder="カテゴリ名">
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
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