@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入ページタイトル -->
    <div>
        <h1>収入</h1>
    </div>
    <!-- 表示されている収入の合計金額 -->
    <div>
        <p>合計額：{{ $totalAmount }}円</p>
    </div>
    <!-- 収入登録リンク -->
    <div>
        <a href="{{ route('income.create') }}">収入を登録する</a>
    </div>
    <!-- 絞り込み検索 -->
    <div>
        <h2>絞り込み検索</h2>
        <div>
            <form action="{{ route('income.index') }}" method="GET">
                @csrf
                <span>収入源 : </span>
                <select name="income_source_id" id="income_source_id">
                    <option disabled selected value="">収入源を選択してください</option>
                    @foreach($income_sources as $id => $income_source)
                    <option value="{{ $id+1 }}">{{ $income_source->name }}</option>
                    @endforeach
                </select>
                <span>日付 : </span>
                <input type="date" name="start_date" value="{{ request('start_date') }}">
                <span> ~ </span>
                <input type="date" name="end_date" value="{{ request('end_date') }}">
                <input type="submit" value="検索">
            </form>
        </div>
    </div>
    <!-- 収入一覧 -->
    <table border="1">
        <tr>
            <th>収入名</th>
            <th>金額</th>
            <th>日付</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($incomes as $income)
        <tr>
            <td>{{ $income->income_source->name }}</td>
            <td>{{ $income->amount }}</td>
            <td>{{ $income->accrual_date }}</td>
            <td>
                <a href="{{ route('income.edit', $income->id) }}">編集</a>
            </td>
            <td>
                <form action="{{ route('income.delete') }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $income->id }}">
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection