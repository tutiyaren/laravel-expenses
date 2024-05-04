@extends('top.header')

@section('content')

<div class="main">
    <!-- ページタイトル -->
    <div class="ttl">
        <h1 class="ttl-top">
            収入源一覧
        </h1>
    </div>
    <!-- 収入源追加リンク -->
    <div>
        <a href="{{ route('income_source.create') }}">収入源を追加する</a>
    </div>
    <!-- 収入源一覧 -->
    @if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
    @endif
    <table border="1">
        <tr>
            <th>収入源</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($income_sources as $income_source)
        <tr>
            <td>
                {{ $income_source->name }}
            </td>
            <td>
                <a href="{{ route('income_source.edit', $income_source->id) }}">編集</a>
            </td>
            <td>
                <form action="{{ route('income_source.delete') }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $income_source->id }}">
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- 戻るリンク -->
    <div>
        <a href="{{ route('income.create') }}">戻る</a>
    </div>
</div>

@endsection