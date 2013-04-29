<!--Footer Section-->
	<?php
		$tmg_data = get_option(OPTIONS);
		if(is_active_sidebar( 'footer-section-1' ) || is_active_sidebar( 'footer-section-2' ) || 
			is_active_sidebar( 'footer-section-3' ) || is_active_sidebar( 'footer-section-4' ))
		{			
	?>
	<div class="band footer" id="footer">	
		<footer class="main container">
			<div class="one_fourth">
				<?php dynamic_sidebar('footer-section-1'); ?>				
			</div>
			<div class="one_fourth">
				<?php dynamic_sidebar('footer-section-2'); ?>			
			</div>
			<div class="one_fourth">
				<?php dynamic_sidebar('footer-section-3'); ?>									
			</div>
			<div class="one_fourth last">
				<?php dynamic_sidebar('footer-section-4'); ?>			
			</div>
		</footer><!-- container -->	
	</div><!--end band-->
	<?php 
		} //end if is_active_sidebar
	?>

	<div class="band bottom">
	
		<footer class="bottom container">
		
			<div class="one_half first-credit">
				<p>
          			<?php echo $tmg_data['footer_text1']?>
        		</p>
			</div>
			
			<div class="one_half last last-credit">
				<p>
          			<?php echo $tmg_data['footer_text2']?>
        		</p>			
			</div>				
		</footer><!-- container -->
	
	</div><!--end band-->

	<div id="tooltip"></div>
	<div id="colourTooltip"></div>
	
	<!--slight variant on Chris Coyier's http://css-tricks.com/convert-menu-to-dropdown/ -->
	
	<script type="text/javascript">
		(function($) {	
				
				// Create the dropdown bases
				$("<select />").appendTo(".navigation nav");
				
				// Create default option "Go to..."
				$("<option />", {
				   "selected": "selected",
				   "value"   : "",
				   "text"    : "Go to..."
				}).appendTo("nav select");
				
				
				// Populate dropdowns with the first menu items
				$(".navigation nav li a").each(function() {
				 	var el = $(this);
				 	$("<option />", {
				     	"value"   : el.attr("href"),
				    	"text"    : el.text()
				 	}).appendTo("nav select");
				});
				
				//make responsive dropdown menu actually work			
		      	$("nav select").change(function() {
		        	window.location = $(this).find("option:selected").val();
		      	});

		})(jQuery);
	</script>

	<!--
		Analytics Code
	-->

	<?php 
		$tracking_code = $tmg_data['tracking_code'];
		if(!empty($tracking_code))
			echo $tracking_code; 
	?>


	<!-- End Document
================================================== -->
	<?php 
	/* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
	wp_footer();?>
</body>
</html>