@extends('top.header')

@section('content')

<div class="main">
    <!-- 支出ページタイトル -->
    <div>
        <h1>支出</h1>
    </div>
    <!-- 表示されている支出の合計金額 -->
    <div>
        <p>合計額：{{ $totalAmount }}円</p>
    </div>
    <!-- 支出登録リンク -->
    <div>
        <a href="{{ route('spending.create') }}">支出を登録する</a>
    </div>
    <!-- 絞り込み検索 -->
    <div>
        <h2>絞り込み検索</h2>
        <form action="{{ route('spending.index') }}" method="get">
            @csrf
            <span>カテゴリー : </span>
            <select name="category_id">
                <option disabled selected style="display: none;">カテゴリーを選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            <span>日付 : </span>
            <input type="date" name="from" value="{{ old('from') }}">
                <span> ~ </span>
            <input type="date" name="until" value="{{ old('until') }}">
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
        @foreach($spendings as $spending)
        <tr>
            <td>{{ $spending->name }}</td>
            <td>{{ $spending->category->name }}</td>
            <td>{{ $spending->amount }}</td>
            <td>{{ $spending->accrual_date }}</td>
            <td>
                <a href="{{ route('spending.edit', $spending->id) }}">編集</a>
            </td>
            <td>
                <form action="{{ route('spending.delete') }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $spending->id }}">
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection