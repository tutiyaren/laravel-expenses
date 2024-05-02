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
    <table border="1">
        <tr>
            <th>カテゴリ</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        <tr>
            <td>
                動物
            </td>
            <td>
                <a href="{{ route('category.edit') }}">編集</a>
            </td>
            <td>
                <form action="" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="" value="">
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    </table>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('spending.create') }}">戻る</a>
    </div>
</div>

@endsection