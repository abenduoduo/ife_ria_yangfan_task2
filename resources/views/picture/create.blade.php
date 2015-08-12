@extends('core')

@section('content')

 <section class="container">     
      <form action="{{url('picture')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="text" name="title" class="form-control" placeholder="标题">
<input type="text" name="dimension" class="form-control"  placeholder="尺寸">
<input type="text" name="tag" class="form-control"  placeholder="Tag">
<input type="submit" value="送出" class="btn btn-primary">
</form>
</section>
@stop