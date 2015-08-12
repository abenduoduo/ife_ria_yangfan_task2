jQuery(document).ready(function($){
  
  jQuery(function() {
	ajax_page_load.init();
  });
  
  var ajax_page_load = {
      init: function(){
        
        this.tagPageLoad();
      },
      
      tagPageLoad: function(){
        var $ = jQuery.noConflict();
        
            $.ajax({
                
      				// 目标url
                url: window.location.protocol + "//" + window.location.host +"/picture/listcat",
                success: function(msg){
                    $('.toolbar-button').fadeOut(300);
                    var msgArray = msg.split(',');
                //    console.log(msgArray);
                    $('.navbar').html('<li class="tag-item" action="navier" title="All pictures">所有图片</li>');
                    for (var i =0 ; i<msgArray.length; i++){
                        $navitem = '<li class="tag-item" title="'+msgArray[i] +'" action="navier">' + msgArray[i] + '</li>';
                        $('.navbar').append($navitem);
                    }
                
                    $('.navbar').append("<li action='upload' class='tag-item'>上传新文件</li>"); 
                    $('.navbar').append("<li action='massedit' class='tag-item'>图片编辑器</li>"); 
                    $('[action=navier]').click(function(e){
                        e.preventDefault();
                        $('.toolbar-button').fadeOut(300);
                        $(this).css({"color":"red"});
                        var clickItem = $(this);
                        var $cat = ($(this).attr("title")=="All pictures")?'':$(this).attr("title");
                        $("#main").empty();
                        $.ajax({
                            url: window.location.protocol + "//" + window.location.host +"/picture/listpics/"+$cat,
                            success: function(msg){
                               clickItem.css({"color":"#333"});
                            //    console.log($cat);
                              //  console.log(msg);
                               var baseurl = window.location.protocol + "//" + window.location.host + "/data/eddie32/upload/";
                                  
                                   for (i =0 ; i<msg.length; i++){
                                      $box = $('<div class="box"></div>'); 
                                      
                                      $( "<img>" ).attr({
                                          "src":baseurl+msg[i].title,
                                          "class": "img-thumbnail img-responsive"
                                          
                                      }).appendTo($box);
                                      $li = $('<div class="pin"></div>').append($box);
                                      $li.appendTo("#main");
                                      
                                   }
                                   
                            }
                        });
                         
                    });
                    
                    $('[action=upload]').click(function(e){
                        $('.toolbar-button').fadeOut(300);
                        var clickItem = $(this);
                        $("#main").empty();
                        $.ajax({
                            url: window.location.protocol + "//" + window.location.host +"/picture/upload/",
                            success: function(msg){
                              //  console.log(msg);
                                $('#main').append($(msg).find('section'));
                            }
                        });
                    });
                    
                    $('[action=massedit]').click(function(e){
                        
                        var clickItem = $(this);
                        $("#main").empty();
                        $.ajax({
                            url: window.location.protocol + "//" + window.location.host +"/picture/massedit/",
                            success: function(msg){
                                //console.log(msg);
                                $('#main').append($(msg).find('section'));
                            }
                        });
                        
                        
                        
                    });    
                        
                        /*
                    
                    
                    $('#waterfall').click(function(e){
                        
                        $ = jQuery.noConflict();
                         var hArray = [];
                        var $outerbox = $('.box');
                        var w = $outerbox.eq(0).outerWidth();
                        var col = Math.floor($(window).width()/w)-1;
                        $("#main").width(w*col)
                                  .css({'margin':'0 auto'});
                        console.log($outerbox.outerWidth());
                        
                        
                        $outerbox.each(function(index,value){
                            var h = $outerbox.eq(index).outerHeight();
                            if(index<col){
                                hArray[index] = h;
                            }else{
                                var minH = Math.min.apply(null,hArray);
                                var minHIndex = $.inArray(minH, hArray);
                                $(value).css({
                                    'position':'absolute',
                                    'top': $outerbox.eq(minHIndex).position().top + hArray[minHIndex] + 15,
                                    'left':$outerbox.eq(minHIndex).position().left 
                                    
                                });
                                hArray[minHIndex] = hArray[minHIndex] + $outerbox.eq(index).outerHeight() + 15;
                            }
                           
                            
                            
                        });
                        console.log(hArray);
                        
                        
                        
                    });
                       
                        
                        */
                        
                    
                    
                    
                } 
            });
            
            
            
            
            
            
       }
  };
});

