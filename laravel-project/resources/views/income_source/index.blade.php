@extends('top.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">
            収入源一覧
        </h1>
    </div>
    <!-- 収入源追加リンク -->
    <div>
        <a href="{{ route('income_source.create') }}">収入源を追加する</a>
    </div>
    <!-- 収入源一覧 -->
    <table border="1">
        <tr>
            <th>収入源</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        <tr>
            <td>
                動物
            </td>
            <td>
                <a href="{{ route('income_source.edit') }}">編集</a>
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
        <a href="{{ route('income.create') }}">戻る</a>
    </div>
</div>

@endsection