@extends('core')

@section('content')
<section class="container">
    
    {!!Html::style('assets/css/editor.css') !!}
    <hr>
    <div class="side-col">
        <h2>工具</h2>
        
        <ul class='toolbar'>
            <li class='toolbar-item'> 
                <a href='#'>调整</a> 
                <ul class='toolbar-sub-item'>
                    <li><input type="checkbox" name="add">叠加模式</input></li>
                    <li>位置</li>
                    <li>尺寸</li>
                </ul>    
            </li>
            <li class='toolbar-item'> 
                <a href='#'>滤镜</a>
                <ul class='toolbar-sub-item'>
                    <li name='blackwhite'>去色</li>
                    <li name='colorinvert'>反向</li>
                    <li name='rewind'>还原</li>
                </ul> 
            </li>
            <li class='toolbar-item'> 
                <a href='#'>导出</a>
                <ul class='toolbar-sub-item'>
                    <li name='download'>download</li>
                </ul> 
            </li>
        </ul>
        <hr>
        <h2>图片列表</h2>
        <ul class='picturelist'>
        @foreach($query as $var)
        
        <li><div class="image-item"><img style="width: 75px;" class="img-thumbnail img-responsive" alt="Responsive image" src="{{url('data/'.$var->usr.'/upload/'.$var->title) }}"/></div></li>
        @endforeach
        <ul>    
        
</div>
<div class="main-col">
    <canvas id="myCanvas" width='1000' height='600' style="border:1px solid #c3c3c3;">
Your browser does not support the canvas element.
</canvas>
    </div>
        
            {!!Html::script('assets/js/photoeditor.js') !!}
</section>
@stop  