@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入源編集ページタイトル-->
    <div>
        <h1>編集</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('income_source.update') }}" method="post">
        @method('put')
        @csrf
        <label for="income_sourceName">収入源 : </label>
        <input type="hidden" name="id" value="{{ $income_source->id }}">
        <input type="text" id="income_sourceName" name="name" value="{{ $income_source->name }}" placeholder="収入源名">
        @error('name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</div>

@endsection