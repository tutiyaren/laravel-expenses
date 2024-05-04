@extends('top.header')

@section('content')

<div class="main">
    <!-- 収入編集ページタイトル -->
    <div>
        <h1>収入編集</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('income.update') }}" method="post">
        @method('put')
        @csrf
        <div>
            <label for="income_sourceName">収入源 : </label>
            <select name="income_source_id" id="income_sourceName">
                @foreach($income_sources as $income_source)
                <option value="{{ $income_source->id }}" {{ $income_source->id == $income->income_source_id ? 'selected' : '' }}>
                    {{ $income_source->name }}
                </option>
                @endforeach
            </select>
            @error('income_source_id')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="incomeMoney">金額</label>
            <input type="number" id="incomeMoney" name="amount" placeholder="金額" value="{{ $income->amount }}">
            <span>円</span>
            @error('amount')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="incomeDate">日付</label>
            <input type="date" id="incomeDate" name="accrual_date" value="{{ $income->accrual_date }}">
            @error('accrual_date')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="id" value="{{ $income->id }}">
        <div>
            <button type="submit">編集</button>
        </div>
    </form>
</div>

@endsection