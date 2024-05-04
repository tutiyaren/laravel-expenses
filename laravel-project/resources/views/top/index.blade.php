@extends('top.header')

@section('content')

<div class="main">
    <!-- アプリタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">家計簿アプリ</h1>
    </div>
    <!-- 年毎の検索 -->
    <form action="{{ route('index') }}" method="get">
        @csrf
        <select name="year">
            @foreach($years as $year)
            <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
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
        @foreach(range(1, 12) as $month)
        <tr>
            <td>
                {{ $month }}
            </td>
            <td>
                {{ $monthIncomes[$selectedYear][$month] ?? 0 }}
            </td>
            <td>
                {{ $monthSpendings[$selectedYear][$month] ?? 0 }}
            </td>
            <td>
                {{ ($monthIncomes[$selectedYear][$month] ?? 0) - ($monthSpendings[$selectedYear][$month] ?? 0) }}
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection