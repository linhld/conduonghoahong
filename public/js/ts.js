		$(document).ready(function(){
	
			$('.video-wrapper').click(function(){
				var a=$(this);
				var html='<div class="video-box"><div class="title"><div class="titleDetail"></div><span>X</span></div><div class="video-content"><div class="video-left">left</div><div class="video-right">right</div></div></div>';
				
				$(this).parent().after(html);
				$(this).parent().next().animate({width:"960px", height:"600px"},"fast");
				var id=$(this).attr('id');
				$.ajax({url:'ajax.php',
				type:'POST',
				data:'id='+id,
				success:function(e){
					var arr=e.split('[BR]');
					var videoZoom='<span>PHÓNG TO</span>';
					var fb_plugin='<div class="fb-comments" data-href="http://trongsang.com/video'+id+'.html " data-width="190" data-numposts="5" data-colorscheme="light"></div>';
					a.parent().next().find('.titleDetail').html(a.find('span').html()+' - '+arr[1]+' - '+arr[2]+' lượt xem');
					a.parent().next().find('.video-left').html('<div class="video-player"></div><div class="video-bottom"><div class="video-share"></div><div class="video-vote"></div><div class="video-zoom"></div></div>');
					a.parent().next().find('.video-share').html(shareBox);
					a.parent().next().find('.video-vote').html(videoVote);
					a.parent().next().find('.video-zoom').html(videoZoom);
					a.parent().next().find('.video-player').html(arr[0]);
					
					a.parent().next().find('.video-right').html(fb_plugin);
					FB.XFBML.parse(); 
				}
				});
				
				
				var offset=$(this).position().top -$(window).scrollTop()+$('.video-group').height() ;
				$('body').scrollTo( {top:'+='+offset+'px', left:'+=0'}, 800 );
				$('.video-zoom').click(function(){
					$(this).html('f');
				});
				$('.title >span').click(function(){
					$(this).parent().parent().fadeOut();
				});
			});
			$('.closeAll').click(function(){
				$('.video-box').fadeOut();
			});
		
		});
