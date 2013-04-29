jQuery(window).load(function($){

	initMain();

});





function getGridBlockHover(hoverElement){

	jQuery(hoverElement).each(function(){

		var imageWidth = jQuery(this).find('img').width(),

			itemWidth = jQuery(this).width(),

			itemHeight = jQuery(this).height(),

			imageHeight = jQuery(this).find('img').height();

		/*$(this).width(imageWidth);*/

		if(imageHeight < itemHeight){

			jQuery(this).find('img').parent().css({

				'overflow':'hidden', 

				'display':'block', 

				'width':itemWidth+'px', 

				'height':'100%'

			});

			jQuery(this).find('img').css({

				'height': '100%', 

				'width': 'auto',

				'display': 'block'

			});

		}else{

			jQuery(this).find('img').parent().css({

				'overflow':'hidden', 

				'display':'block', 

				'height':itemHeight+'px'

			});

			jQuery(this).find('img').css({

				'height': 'auto', 

				'width': '100%',

				'display': 'block'

			});

		}

	});

	

	jQuery(hoverElement).hover(hoverOver, hoverOut);

	

	function hoverOver(event){

		if(!jQuery(this).hasClass('active')){

			jQuery('.text', this).css({'visibility':'hidden'});

			var textHeight = jQuery('.text', this).css({'height': 'auto'}).outerHeight();

			jQuery('.text', this).filter(':not(:animated)').css({'visibility':'visible'});

			var negative_textHeight = '-' + textHeight + 'px';

			jQuery(this).css('float', 'left');

			jQuery('h4', this).filter(':not(:animated)').animate({bottom: textHeight}, 'normal', 'easeOutQuad');

			jQuery('.text', this).filter(':not(:animated)').css({

				height: 0

			}).animate({ 

				height: textHeight

			}, 'normal', 'easeOutQuad');

			jQuery('img', this).filter(':not(:animated)').animate({

				'margin-top': '-10px'

			}, 'normal', 'easeOutQuad');

		}

		return false;

	}



	function hoverOut(event){

		if(!jQuery(this).hasClass('active')){

			var textHeight = jQuery('.text', this).outerHeight() * -1;

			jQuery('h4', this).animate({bottom: 0}, 'fast', 'easeOutQuad');

			jQuery('.text', this).animate({ height: 0 }, 'fast', 'easeOutQuad', function(){});

			jQuery('img', this).animate({

				'margin-top': '0'

			}, 'fast', 'easeOutQuad');

		}

		return false;

	}

}







function initMain(){

	

	if(jQuery('#portfolio').get(0)){

		getGridBlockHover('ul#portfolio li .inner-item');

	}

	if(jQuery('#portfolio-2col').get(0)){

		getGridBlockHover('ul#portfolio-2col li .inner-item');

	}

	

}

