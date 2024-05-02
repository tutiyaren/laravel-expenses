@extends('top.header')

@section('content')

<div class="main">
    <!-- アプリタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">家計簿アプリ</h1>
    </div>
    <!-- 年毎の検索 -->
    <form action="" method="get">
        @csrf
        <select name="">
            <option value="">2018</option>
        </select>
        <span>年の収支一覧</span>
        <button type="submit">検索</button>
    </form>
    <!-- 一覧テーブル -->
    <table border="1">
        <tr>
            <th>月</th>
            <th>収入</th>
            <th>支出</th>
            <th>収支</th>
        </tr>
        <tr>
            <td>
                1
            </td>
            <td>
                0
            </td>
            <td>
                0
            </td>
            <td>
                0
            </td>
        </tr>
    </table>
</div>

@endsection