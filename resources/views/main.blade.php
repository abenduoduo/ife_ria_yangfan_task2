@extends('cover.master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center">IFE-RIA扬帆作业-图片管理器WEBAPP</h3>
      
      <p class="text-center">
          
     <span class="badge">Author: Tokei; Pictures by {!! Html::link('http://weibo.com/qiyueyumiao', '柒月雨苗', array('target' => '_blank','style'=>'color:#fff')) !!}</span>
     
      </p>
      <ul class="timeline">
        <li>
          <div class="timeline-image">
            
            {!! Html::image('assets/images/cover/1.jpg', 'a picture', array('class' => 'img-circle img-responsive')) !!}
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Feature 1</h4>
              <h4 class="subheading">基本功能</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                图片的上传, 删除, 预览, 修改信息。
                
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            {!! Html::image('assets/images/cover/2.jpg', 'a picture', array('class' => 'img-circle img-responsive')) !!}
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Feature 2</h4>
              <h4 class="subheading"> single-page application (SPA)</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                整个网页整体加载后, 局部刷新
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            {!! Html::image('assets/images/cover/3.jpg', 'a picture', array('class' => 'img-circle img-responsive')) !!}
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Feature 3</h4>
              <h4 class="subheading">拖动</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                拖动排序和拖动改变分类。
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image">
            {!! Html::image('assets/images/cover/4.jpg', 'a picture', array('class' => 'img-circle img-responsive')) !!}
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Feature 4</h4>
              <h4 class="subheading">图片编辑</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                实现图片信息编辑, 滤镜。
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image">
            {!! Html::image('assets/images/cover/5.jpg', 'a picture', array('class' => 'img-circle img-responsive')) !!}
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Feature 5</h4>
              <h4 class="subheading">后端</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                后端采用Laravel 5框架生成。
              </p>
            </div>
          </div>
        </li>
      </ul>
      
    </div>
  </div>
  <div class="row">
      <div  class="col-lg-12" style="margin-top:2em">
      <p class="text-center">
      {!! Html::link('/picture/manager', '进 入', array('class' => 'btn btn-info btn-lg','role' => 'button')) !!}
       
      </p>
      </div>
  </div>      
</div>
@endsection
 

