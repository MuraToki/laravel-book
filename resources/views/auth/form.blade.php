@extends('layout')
@section('title', '感想投稿')
@section('show')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>作成投稿フォーム/<a href="{{ route('show') }}">一覧</a></h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
          @csrf
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    type="text"
                    placeholder="何の本を読んだ？"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                    本文
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4"
                    placeholder="何を学んだ？　一言書いてください"
                >{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('show') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(confirm('送信してもええか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
