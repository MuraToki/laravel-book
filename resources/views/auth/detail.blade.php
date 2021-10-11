 @extends('layout')
 @section('title', '詳細一覧')
@section('show')
<div class="row">
  <div class="col-md-4 p-4">
    <h3>{{ $book->title }}</h3>
    <p>{{ $book->content }}</p>
    <p>作成日：{{ $book->created_at }}</p>
    <a href="{{ route('show') }}" class="btn btn-primary"><i class="fas fa-hand-point-left"></i></a>
  </div>
</div>
<script>

@endsection