@extends('core')

@section('content')

 <section class="container">     
     <section class="container">     
     <form action="{{url('picture/605')}}" method="post">
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                   <input type="hidden" name="_method" value="delete">
                   <input type="submit" role="btn" class="btn btn-danger" value="删除">
     </form> 
</section>

@stop