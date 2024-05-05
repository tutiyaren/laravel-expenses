@extends('top.header')

@section('content')

<div class="main">
    <!-- カテゴリ編集ページタイトル-->
    <div>
        <h1>編集</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('category.update') }}" method="post">
        @method('put')
        @csrf
        <label for="categoryName">カテゴリ名 : </label>
        <input type="hidden" name="id" value="{{ $category->id }}">
        <input type="text" id="categoryName" name="name" value="{{ $category->name }}" placeholder="カテゴリ名">
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</div>

@endsection