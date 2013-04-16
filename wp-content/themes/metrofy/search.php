<?php get_header() ?>
	<!--Content-->
	<div class="content">
		<div class=" band container">
			<h1 class="pageTitle"><?php _e( 'Search', 'tmg-framework' ); ?> | <?php echo get_search_query();?></h1>				
			<!--Content Area-->
			<div class="two_thirds" id="blog-section">
				<!--start the loop-->
				<?php if ( have_posts() ) : ?>
				<div class="additional-content">
					<h5><?php _e( 'Search Results for: ', 'tmg-framework' ); ?><?php echo get_search_query();?></h5>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>
				<article class="post">
					<?php 
						if($tmg_data['blog_layout'] == "thumbnails") 
						{
							get_template_part('blog', 'thumbs');
						}/*end if thumbnails*/ 
						else 
						{ 
							get_template_part('blog', 'featured');
							global $more;    
							$more = 0; 
							the_content(__('Read more...', 'tmg-framework' ));
						} //end else 
						get_template_part('article', 'meta');
					?>
				</article>		
				<?php endwhile; else: ?>
				<article>
					<h1><?php _e('No results were found matching your criteria. Please try something else.', 'tmg-framework');?></h1>
				</article>
				<?php endif; ?>
				<!--Pagination-->			
				<?php
					if (function_exists("pagination")) {
					    pagination($wp_query->max_num_pages);
					} 
				?>			
			</div>
			<!--Left Sidebar-->
			<?php get_sidebar(); ?>
		</div>
	</div>		
	<?php get_footer(); ?>