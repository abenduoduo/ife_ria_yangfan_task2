<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- This template is designed by mouse0270 with MIT license -->
    <title>App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}"/>
        {!!Html::style('assets/css/reset.css') !!}
   <!-- {!!Html::style('assets/css/normalize.css') !!}
    
    {!!Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
     {!!Html::style('assets/bootstrap/css/bootstrap-theme.min.css') !!}-->
    {!!Html::style('assets/css/style.css') !!}
     
    {!!Html::script('assets/js/jquery-2.1.4.min.js') !!}
    {!!Html::script('assets/js/jquery-migrate-1.2.1.min.js') !!} 
 
</head>
<body>
<!--Beginning of body -->
<div class='banner' style="width:100%;padding:0">
    <img src="http://lar.eddie32.tk/data/eddie32/upload/banner.png" style="width:100%;height:auto;">
    <ul style="margin-top:-20px;color:red;">
        <li style="text-indent:0.2em">瀑布流<li>
         <li style="text-indent:0.2em">拖动整合<li>
             <li style="text-indent:0.2em">分拆完全/信息修改功能<li>
                 <li style="text-indent:0.2em">图片大小, 拖动</li>    
    </ul>
</div>
<div id="outerWrapper">    
<div id="wrapper">
@yield('content')  
</div> <!-- wrapper -->
</div>   <!-- outerWrapper --> 
<!--End of body -->
</body>
</html>   