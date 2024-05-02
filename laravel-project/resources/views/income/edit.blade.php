@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入編集ページタイトル -->
    <div>
        <h1>収入編集</h1>
    </div>
    <!-- フォーム -->
    <form action="" method="post">
        @csrf
        <div>
            <label for="income_sourceName">収入源 : </label>
            <select name="" id="income_sourceName">
                <option value="">バイク</option>
            </select>
        </div>
        <div>
            <label for="incomeMoney">金額</label>
            <input type="number" id="incomeMoney" name="" placeholder="金額" value="">
            <span>円</span>
        </div>
        <div>
            <label for="incomeDate">日付</label>
            <input type="date" id="incomeDate" name="" value="">
        </div>
        <div>
            <button type="submit">編集</button>
        </div>
    </form>
</div>

@endsection