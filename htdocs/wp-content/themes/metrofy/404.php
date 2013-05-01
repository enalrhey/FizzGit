<?php get_header() ?>
	<!--Content-->
	<div class="content">
		<div class=" band container">
			<h1 class="pageTitle"><?php _e( 'Page not found!', 'tmg-framework' )?> </h1>				
			<!--Content Area-->
			<div id="blog-section">				
				<h1><?php _e( 'Page not found!', 'tmg-framework' )?></h1>
				<hr/>
				<article>
					<p><?php _e( 'Oops, it seems you\'re looking for something that\'s not here. Please try again.', 'tmg-framework' )?></p>

					<div class='search-form-404'>
						<?php get_search_form();?>
					</div>
				</article>
			</div>			
		</div>
	</div>		
	<?php get_footer(); ?>