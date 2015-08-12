@extends('core')

@section('content')
<section class="container">
    <!--
     {!!Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
     {!!Html::style('assets/bootstrap/css/bootstrap-theme.min.css') !!}-->
    
    <table class="table table-hover">
        <tr>
        <td>图片id</td>
        <td>图片名称</td>
        <td>图片预览图</td>
        <td>图片尺寸</td>
        <td>图片Tag</td>
        </tr>
        @foreach($query as $var)
        <tr>
           <td><input type="checkbox" class="selectPictures" action="picturePushIn" value="{{$var->id}}">{{$var->id}}</td>
           <td style="width:20%;max-width:30%;word-wrap: break-word;">{{$var->title}}</td>
           <td><img style="width: 100px;" class="img-thumbnail img-responsive" alt="Responsive image" src="{{url('data/'.$var->usr.'/upload/'.$var->title) }}"/></td>
           <td>{{$var->dimension}}</td>
           <td>{{$var->tag}}</td>
        </tr>
        @endforeach
    </table>
    <div class="form-section-delete-all" style="display:none">
        <!--
    <form action="{{url('picture/'.$var->id)}}" method="post" class="form-delete">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="_method" value="delete">
          <input type="submit" role="btn" class="btn btn-danger" value="删除">
    </form>-->
    {!!Html::script('assets/js/masseditor.js') !!}
    </div>
    <!--
    {!!Html::script('assets/js/photoeditor.js') !!}-->
</section>
@stop    