@extends('core')

@section('content')

 <section class="container">     
      <form action="{{url('picture/'.$query->id)}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">

<input type="hidden" name="_method" value="PUT">
<input type="text" name="title" class="form-control" placeholder="标题"
value="{{$query->title}}">
<input type="text" name="dimension" class="form-control"  placeholder="尺寸" value="{{$query->dimension}}">
<input type="text" name="tag" class="form-control"  placeholder="Tag"
value="{{$query->tag}}">
<input type="submit" value="送出" class="btn btn-primary">
</form>
</section>
@stop