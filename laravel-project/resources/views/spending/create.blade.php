@extends('top.header')

@section('content')

<div class="main">
    <!-- 支出登録ページタイトル -->
    <div>
        <h1>支出登録</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('spending.store') }}" method="post">
        @csrf
        <div>
            <label for="spendingName">支出名</label>
            <input type="text" id="spendingName" name="name" placeholder="支出名" value="{{ old('name') }}">
            @error('name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="categoryName">カテゴリー : </label>
            <select name="category_id" id="categoryName">
                <option value="" disabled selected>選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('category.index') }}">カテゴリ一覧へ</a>
            @error('category_id')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="spendingMoney">金額</label>
            <input type="number" id="spendingMoney" name="amount" placeholder="金額" value="{{ old('amount') }}">
            <span>円</span>
            @error('amount')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="spendingDate">日付</label>
            <input type="date" id="spendingDate" name="accrual_date" value="{{ old('accrual_date') }}">
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
        <a href="{{ route('spending.index') }}">戻る</a>
    </div>
</div>

@endsection