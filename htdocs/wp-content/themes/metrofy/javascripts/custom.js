/*Custom script*/
var SNAPPED = false;
var SCROLLELEMENT = 'html, body';
var TABELEMENT = 'html, body';
var SCROLLPADDING = 0;
var AUTOSCROLL = false;

//Scroll to element with specific ic (for in-page scrolling)
function scrollToElement(el) {			
	AUTOSCROLL = true;	
	jQuery(SCROLLELEMENT).stop().animate(
		{ scrollTop: el.offset().top - SCROLLPADDING },
		600,
		function(){AUTOSCROLL = false;}
	);	
}

//change active view
function changeActiveView(e){
    //Get Location of tab's content
    var contentLocation = jQuery(TABELEMENT).attr('href');
    //Let go if not a hashed one
    if(contentLocation.charAt(0)=="#") {
        e.preventDefault();
        //Make Tab Active
        jQuery(TABELEMENT).parent().siblings().children('a').removeClass('active');
        jQuery(TABELEMENT).addClass('active');
        //Show Tab Content & add active class
        jQuery(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
    }
}

(function($) {		
			//Integrate PrettyPhoto with all images in articles that have a hyperlink
			$('.article-content a').has('img').addClass('prettyPhoto'); 
			//Handle PrettyPhoto image description
			$('.entry-content a img').click(function () {
				var desc = $(this).attr('title');
				$('.entry-content a').has('img').attr('title', desc);
			});

			//handle scroll - to highlight corresponding menu item		
			$(window).scroll(function(){
							if(AUTOSCROLL) return;
							var lastId,
							topMenu = $("#tray"),			    
							topMenuHeight = topMenu.outerHeight() + 15 + 25, //+25 for section heading top-padding and 15 for buffer height	    
							menuItems = topMenu.find("li.internal a"),			    
							scrollItems = menuItems.map(function(){			      
								var item = $($(this).attr("href"));			      
								if (item.length) { return item; }			    
							})			   
							var fromTop = $(this).scrollTop()+topMenuHeight;						   
							var cur = scrollItems.map(function(){			     
								if ($(this).offset().top < fromTop)			       
									return this;			   
							});			   
							cur = cur[cur.length-1];			   
							var id = cur && cur.length ? cur[0].id : "";			   
							if (lastId !== id) {			       
								lastId = id;			       
								menuItems.removeClass("active");		 			    
								$(".sf-menu li a[href='" + '#' + id + "']").addClass("active");			   
							}          			
						});		

			var nav = $('#nav');
			var the_window = $(window);
			var topmost_point = nav.offset().top;
			//------ Capture the height of the navigation bar.			
			SCROLLPADDING = nav.height() + $('#topheader').height();
			//Smooth scroll on anchor link from another page
			if (location.hash != '') 
			{
				scrollToElement($(location.hash));
			}				 								
			
			//Toggle Panes
			$(".toggle_container").hide(); 

			//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
			$("p.trigger").click(function(){
				$(this).toggleClass("active").next().slideToggle("slow");
				return false; //Prevent the browser jump to the link anchor
			});

			//hack for right in-page scroll when WP admin bar is visible
			if ($('#wpadminbar').length > 0) {
				$('#nav').css("top", "102px");
			}

			//initialize prettyphoto
			if($("a[class^='prettyPhoto']").length > 0)
				$("a[class^='prettyPhoto']").prettyPhoto({social_tools:false});

             $('ul.sf-menu').superfish({
				delay:       800,                            // half second delay on mouseout
				animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
				speed:       'normal',                          // faster animation speed
				speedOut: 	 'slow', 
				autoArrows:  false                            // auto generation of arrow mark-up
			});

			//flex slider
			$('.flexslider_small').flexslider({
				directionNav:false,
				controlNav:true,
				slideshow: true,
			});
			//flexslider without any navigation
			$('.flexslider_nonav').flexslider({
				directionNav:false,
				controlNav:false,
				slideshow: true,
			});
			//flexslider used in artcles/portfolio items
			$('.flexslider').flexslider({
				directionNav:false,
				controlNav:true,
				slideshow: true,
			});
			//flexslider for testimonials
			$('.testimonial_slider').flexslider({
				directionNav:false,
				controlNav:false,
				slideshow: true,
			});

			//Social Tooltips on header
			function showSocialToolTip(e, img){
				var path = img;
				$('#tooltip').css({'top':e.pageY+10, 'left':e.pageX-110, 'background':'none'});
				$('#tooltip').html('<img src="' + path + '" alt="tooltip">');	
				$('#tooltip').show();	
			}
				
			function hideSocialToolTip(){
				$('#tooltip').hide();
			}
			function moveSocialToolTip(e){
				$('#tooltip').show();
				$('#tooltip').css({'top':e.pageY+10, 'left':e.pageX-110});
			}

			$('.socialicon').on('mouseenter', function(e){
				$(this).find('img').attr('src', $(this).attr('data-roll'));
				showSocialToolTip(e, $(this).attr('data-tooltip'));
			});
			
			$('.socialicon').on('mouseleave', function(e){
				$(this).find('img').attr('src', $(this).attr('data-normal'));
				hideSocialToolTip();
			});
			
			$('.socialicon').on('mousemove', function(e){
				moveSocialToolTip(e);
			});

			if($('ul#portfolio').length != 0)
			{
				$('ul#portfolio').isotope({
					itemSelector : '.portfolio-item'
				});
			}

			if($('#portfolio-nav').length != 0)
			{
				var $optionSets = $('#portfolio-nav'),
          		$optionLinks = $optionSets.find('a');
          	}

			//Isotope Portfolio Filter
			$('ul#portfolio-nav a').click(function() {  

				var $this = $(this);
		        // don't proceed if already selected
		        if ( $this.hasClass('current') ) {
		          return false;
		        }

				$(this).css('outline','none');  
				$('ul#portfolio-nav .current').removeClass('current');  
				var filterVal = $(this).parent().attr('class');
				$(this).parent().addClass('current');  

		        // make option object dynamically, i.e. { filter: '.my-filter-class' }
		        var options = {},
		            key = $('#portfolio-nav').attr('data-option-key'),
		            value = $this.attr('data-option-value');
		        // parse 'false' as false boolean
		        value = value === 'false' ? false : value;
		        options[ key ] = value;
		        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		          // changes in layout modes need extra logic
		          changeLayoutMode( $this, options )
		        } else {
		          // otherwise, apply new options
		          $('ul#portfolio').isotope( options );
		        }				
		  
				return false;  
			});				
		
			//Setup in-page scrolling for .internal links.
			$('ul.home-menu li.internal a, a.internal').click(function(event) {
				event.preventDefault();
				//------ Retrieve subject, trading on the fact that selector & named anchor syntax both use leading # symbols.
				var target = $(this.hash);
				if(target.length && this.hash) {
					
					scrollToElement(target);
				} 
				//Set class to 'active'
               	$(this).parent().siblings().find('a').removeClass('active');
               	$(this).addClass('active');				
				return false;				
			});


			//Sniff for whether to use html or body element for scrolling.
			$('html, body').each(function () {
				var initScrollTop = $(this).attr('scrollTop');
				$(this).attr('scrollTop', initScrollTop + 1);
				if ($(this).attr('scrollTop') == initScrollTop + 1) {
					SCROLLELEMENT = this.nodeName.toLowerCase();
					$(this).attr('scrollTop', initScrollTop);
					return false;
				}
			});

			//Tiles hover animation
			$('.tile').each(function(){
			var $span = $(this).children('span');
			$span.css('bottom', "-"+$span.outerHeight()+'px');
			});
			
			var bottom = 0;
			
			$('.tile').hover(function(){
				var $span = $(this).children('span');
				if(!$span.data('bottom')) $span.data('bottom',$span.css('bottom'));
				$span.stop().animate({'bottom':0},250);
			},function(){
				var $span = $(this).children('span');
				$span.stop().animate({'bottom':$span.data('bottom')},250);
			});

			//Tab Change Handling
			$('ul.tabs > li > a').click(function(e) {
				TABELEMENT = this;
				changeActiveView(e);
			});	
			//Page Change Handling
			$('ul.pages > li > a').click(function(e) {
				TABELEMENT = this;
				changeActiveView(e);
			});	
		})(jQuery);	