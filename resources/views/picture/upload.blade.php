@extends('core')

@section('content')
<div class="content clearfix" id="main">
<section id="upload">
    {!!Html::style('assets/webuploader/webuploader.css') !!}
    {!!Html::style('assets/webuploader/style.css') !!}
    
    <div id="wrapper">
        <div id="container">
            <!--头部，相册选择和格式选择-->

            <div id="uploader">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <p>或将照片拖到这里，单次最多可选300张</p>
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div><div class="info"></div>
                    <div class="btns">
                        <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="clear"></div>
        <section class="container" style="display:none">     
            <form action="{{url('picture')}}" method="post" id="form1">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="text" name="title" class="form-control" placeholder="标题">
                <input type="text" name="dimension" class="form-control"  placeholder="尺寸">
                <input type="text" name="tag" class="form-control"  placeholder="Tag">
                <input type="text" name="cat" class="form-control"  placeholder="cat">
                <input type="hidden" name="usr" class="form-control"  value="eddie32">
                <input type="submit" value="送出" class="btn btn-primary">
            </form>
           
        </section>
        <!--
        <button id="submitall">送出全部</button>
        {!!Html::script('assets/js/form.js') !!}-->
        
    </div>
    {!!Html::script('assets/webuploader/webuploader.js') !!}
    {!!Html::script('assets/webuploader/upload.js') !!}
    
</section>
</div>
@stop