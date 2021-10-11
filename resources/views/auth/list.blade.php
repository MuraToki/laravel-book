 @extends('layout')
 @section('title', '感想一覧')
@section('show')
<div class="row">
  <div class="col-md-9 p-4">
    <h2 >読書感想一覧/<a href="{{ route('create') }}">作成</a></h2>
    @if (session('err_msg'))
      <p class="text-danger">
        {{ session('err_msg') }}
      </p>
    @endif
    <table class="table table-striped" >
      <tr class="thead">
        <th>タイトル</th>
        <th>学んだことを一言</th>
        <th>日付</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      @foreach($books as $book)
      <tr class="content">
        <td><a href="/show/{{ $book->id }}">{{ $book->title }}</a></td>
        <td >{{ $book->content }}</td>
        <td >{{ $book->created_at }}</td>
        <td ><button type="button" class="btn btn-dark" onclick="location.href='/edit/{{ $book->id }}'"><i class="fas fa-edit"></i></button></td>

        <form method="POST" action="{{ route('delete', $book->id) }}" onSubmit="return checkDelete()">
        @csrf
        <td ><button type="submit" class="btn btn-danger" onclick=
        ><i class="fas fa-trash-alt"></i></button></td>
        </form>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<script>
function checkDelete(){
if(confirm('削除してもええか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection