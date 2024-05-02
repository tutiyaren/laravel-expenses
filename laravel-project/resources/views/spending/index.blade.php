@extends('top.header')

@section('content')

<div class="main">
    <!-- 支出ページタイトル -->
    <div>
        <h1>支出</h1>
    </div>
    <!-- 表示されている支出の合計金額 -->
    <div>
        <p>合計額：円</p>
    </div>
    <!-- 支出登録リンク -->
    <div>
        <a href="{{ route('spending.create') }}">支出を登録する</a>
    </div>
    <!-- 絞り込み検索 -->
    <div>
        <h2>絞り込み検索</h2>
        <form action="" method="get">
            @csrf
            <span>カテゴリー : </span>
            <select name="">
                <option value="">カテゴリ1</option>
            </select>
            <span>日付 : </span>
            <input type="date" name="" value="">
            <span> ~ </span>
            <input type="date" name="" value="">
            <button type="submit">検索</button>
        </form>
    </div>
    <!-- 支出一覧 -->
    <table border="1">
        <tr>
            <th>支出名</th>
            <th>カテゴリー</th>
            <th>金額</th>
            <th>日付</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        <tr>
            <td>GSX250r</td>
            <td>バイク</td>
            <td>500000</td>
            <td>2024-12-18</td>
            <td>
                <a href="{{ route('spending.edit') }}">編集</a>
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
</div>

@endsection