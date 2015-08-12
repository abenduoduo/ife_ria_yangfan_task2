@extends('core')

@section('content')
<div class="loading-zone"></div>
<nav class="clearfix">
<ul class="navbar">
    <li id='draglist' class='tag-item'>拖动</li>
    
</ul>
</nav>
<div class="clear"></div>
<div style="min-height: 20px"></div>
    <div style="text-align:left;display:none" class="toolbar-button">
        <span>
        <button id="mass-advance">高级工具</button>
        </span>
        <span>
        <button id="mass-edit">批量编辑</button>
        </span>
        <span>
        <button id="mass-delete">批量删除</button>
        </span>
    </div>
    <div style="min-height: 20px"></div>
<div class="content clearfix" id="main">
    
    <div class="info" style="margin-top:2em">
    <h2 style="font-size:22px;line-height:32px">JQuery 2.1.3 + Laravel 5.1.4</h2>
    
    <div id="cov" style="margin-top:10px"></div>
    <script>
    jQuery(document).ready(function($) {
        $.ajax({
							url: window.location.protocol + "//" + window.location.host + "/picture/photoeditor/",
							success: function(msg) {
								$("#cov").empty();
								$('#cov').append($(msg).find('section'));
							}
						});
    });
    
    
    </script>
    </div>
</div>
{!!Html::script('assets/js/manager-core.js') !!}
@stop