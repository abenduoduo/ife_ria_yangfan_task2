/**
 * 
 * @authors eddie32 (admin@nekohand.moe)
 * @date    2015-08-09 20:02:00
 * @version $0.0.1$
 */
jQuery(document).ready(function($) {

	jQuery(function() {
		ajax_photo_editor.init();
	});
	var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
	var originalData;
	var ajax_photo_editor = {
	    
		init: function(){
			this.app_start();
		},
		
		app_start: function(){
			
				ajax_photo_editor.createView();
				ajax_photo_editor.register_listView();
			
			
		},
		createView: function(){
		    $('.image-item').click(function(){
		        var imageUrl = $(this).find('img').attr('src');
		        var checkFlag = $("input[name=add]:checked").length?1:0;
		        convertImgToBase64(imageUrl, function(imageUrl){
    		        //console.log(imageUrl);
    		        $img = $('<img>').attr({'src':imageUrl,'id':'myPicture'});
                         
                    var canvas = $('#myCanvas')[0];
                    var context = canvas.getContext('2d');
                    $img.load(function() {
                              console.log($img[0].width);
                              if(!checkFlag){
                                context.clearRect(0,0,1000,1000);
                              }
                              context.drawImage(this, 0, 0);
                              // javascript图像对象
                              var imgObj =  $img[0];
                              var imageDataContent = context.getImageData(0, 0, imgObj.width, imgObj.height);
                              originalData = imageDataContent;
                              // 黑白
                              ajax_photo_editor.blackWhite(context,imageDataContent);
                              
                              // 反向
                              ajax_photo_editor.colorInvert(context,imageDataContent);
                              
                              //还原
                              ajax_photo_editor.photoRewind(context,imageUrl);
                              
                              //生成下载
                              ajax_photo_editor.createDownloadLink();

                    });
    		    });
		       return false;
		    });
		},
		register_listView: function(){
		    $('.toolbar-item>a').click(function(){
		        $(this).addClass('current')
		               .next()
		               .show()
		               .parent()
		               .siblings()
		               .children('a')
		               .removeClass('current')
		               .next()
		               .hide();
		        return false;
		    });
		},
		
		blackWhite: function(context, imageDataContent){
		     $('li[name=blackwhite]').click(function(){
		         console.log('run');
		         pixels = imageDataContent.data;
		         console.log(pixels);
		         pixels = discolor(pixels);
		         imageDataContent.data = pixels;
		         console.log('after');
		         console.log(pixels);
		         context.clearRect(0,0,1000,1000);
		         context.putImageData(imageDataContent, 0, 0);
		         ajax_photo_editor.createDownloadLink();
		     });
		},   
		colorInvert: function(context, imageDataContent){
		     $('li[name=colorinvert]').click(function(){
		         console.log('run');
		         pixels = imageDataContent.data;
		         console.log(pixels);
		         pixels = invert(pixels);
		         imageDataContent.data = pixels;
		         console.log('after');
		         console.log(pixels);
		         context.clearRect(0,0,1000,1000);
		         context.putImageData(imageDataContent, 0, 0);
		         ajax_photo_editor.createDownloadLink();
		     });
		     
		},
		photoRewind: function(context,imageUrl){
		    $('li[name=rewind]').click(function(){
		       // 重载入图片
		       convertImgToBase64(imageUrl, function(imageUrl){
		           
		           $img = $('<img>').attr({'src':imageUrl,'id':'myPicture'});
                         
                   
                    $img.load(function() {
                    
                              context.clearRect(0,0,1000,1000);
                              context.drawImage(this, 0, 0);
                        
                    });
		           
		           ajax_photo_editor.createDownloadLink();
		           
		           
		       });
		       
		       
		       
		       
		       
		    });
		},
		
		createDownloadLink: function(){
		     
		         var canvas = $('#myCanvas')[0];
		         $('li[name=download]').html('');
		         $('<a>').attr({
		             'href':canvas.toDataURL(),
		             'id':'photoDownload',
		             'download':'after_filter.png'
		         }).appendTo($('li[name=download]'));
		         $('#photoDownload').html('download');

		}
	};

    
	
	


});


function convertImgToBase64(url, callback, outputFormat){
	var img = new Image();
	img.crossOrigin = 'Anonymous';
	img.onload = function(){
	   var canvas = document.createElement('CANVAS');
	    var ctx = canvas.getContext('2d');
		canvas.height = this.height;
		canvas.width = this.width;
	  	ctx.drawImage(this,0,0);
	  	var dataURL = canvas.toDataURL(outputFormat || 'image/png');
	  	callback(dataURL);
	  	canvas = null; 
	};
	img.src = url;
}

 
function discolor(pixes) {
    var grayscale;
    for (var i = 0, len = pixes.length; i < len; i += 4) {
        grayscale = pixes[i] * 0.299 + pixes[i + 1] * 0.587 + pixes[i + 2] * 0.114;
        pixes[i] = pixes[i + 1] = pixes[i + 2] = grayscale;
    }
    return pixes;
}

 
function invert(pixes) {
    for (var i = 0, len = pixes.length; i < len; i += 4) {
        pixes[i] = 255 - pixes[i]; //r
        pixes[i + 1] = 255 - pixes[i + 1]; //g
        pixes[i + 2] = 255 - pixes[i + 2]; //b
    }
    return pixes;
}