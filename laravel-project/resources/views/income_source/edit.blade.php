@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入源編集ページタイトル-->
    <div>
        <h1>編集</h1>
    </div>
    <!-- フォーム -->
    <form action="" method="post">
        @method('put')
        @csrf
        <label for="income_sourceName">収入源 : </label>
        <input type="text" id="income_sourceName" name="" value="" placeholder="収入源名">
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</div>

@endsection