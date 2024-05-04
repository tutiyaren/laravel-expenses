@extends('top.header')

@section('content')

<div class="main">
    <!-- 支出編集ページタイトル -->
    <div>
        <h1>支出編集</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('spending.update') }}" method="post">
        @method('put')
        @csrf
        <div>
            <label for="spendingName">支出名</label>
            <input type="text" id="spendingName" name="name" placeholder="支出名" value="{{ $spending->name }}">
            @error('name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="categoryName">カテゴリー : </label>
            <select name="category_id" id="categoryName">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $spending->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="spendingMoney">金額</label>
            <input type="number" id="spendingMoney" name="amount" placeholder="金額" value="{{ $spending->amount }}">
            <span>円</span>
            @error('amount')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="spendingDate">日付</label>
            <input type="date" id="spendingDate" name="accrual_date" value="{{ $spending->accrual_date }}">
            @error('accrual_date')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="id" value="{{ $spending->id }}">
        <div>
            <button type="submit">編集</button>
        </div>
    </form>
</div>

@endsection