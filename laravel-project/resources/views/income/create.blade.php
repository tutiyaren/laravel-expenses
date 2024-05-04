@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入登録ページタイトル -->
    <div>
        <h1>収入登録</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('income.store') }}" method="post">
        @csrf
        <div>
            <label for="income_sourceName">収入源 : </label>
            <select name="income_source_id" id="income_sourceName">
                <option value="" disabled selected>選択してください</option>
                @foreach($income_sources as $income_source)
                <option value="{{ $income_source->id }}">{{ $income_source->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('income_source.index') }}">収入源一覧へ</a>
            @error('income_source_id')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="incomeMoney">金額</label>
            <input type="number" id="incomeMoney" name="amount" placeholder="金額" value="{{ old('amount') }}">
            <span>円</span>
            @error('amount')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="incomeDate">日付</label>
            <input type="date" id="incomeDate" name="accrual_date" value="{{ old('accrual_date') }}">
            @error('accrual_date')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">登録</button>
        </div>
    </form>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('income.index') }}">戻る</a>
    </div>
</div>

@endsection