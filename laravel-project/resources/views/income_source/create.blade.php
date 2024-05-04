@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入源追加ページタイトル -->
    <div class="ttl">
        <h1>収入源追加</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('income_source.store') }}" method="post">
        @csrf
        <label for="income_sourceName">収入源 : </label>
        <input type="text" id="income_sourceName" name="name" value="{{ old('name') }}" placeholder="収入源名">
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('income_source.index') }}">戻る</a>
    </div>
</div>

@endsection