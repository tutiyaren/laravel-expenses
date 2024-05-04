@extends('top.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">
            カテゴリ一覧
        </h1>
    </div>
    <!-- カテゴリ追加リンク -->
    <div>
        <a href="{{ route('category.create') }}">カテゴリを追加する</a>
    </div>
    <!-- カテゴリ一覧 -->
    @if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>カテゴリ</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>
                {{ $category->name }}
            </td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}">編集</a>
            </td>
            <td>
                <form action="{{ route('category.delete') }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('spending.create') }}">戻る</a>
    </div>
</div>

@endsection