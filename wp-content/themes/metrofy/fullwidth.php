
<?php 
/*

Template Name: Full Width

*/
get_header() ?>
	
	<!--Content-->
	<div class="content">
		<div class=" band container">
			<h1 class="pageTitle"><?php the_title(); ?></h1>				
			<!--Content Area-->
			<div id="blog-section">

				<!--start the loop-->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php
					$post_id = get_the_ID();
					$sectionStyle = get_post_meta($post_id, "tmg_homeSectionStyle", true);
					if($sectionStyle == "none")
          {
            the_content();
          }
          elseif($sectionStyle == "blog")
					{
						$termID = get_post_meta($post_id, "tmg_blogCategory", true);
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						//var $args;
						if($termID == 9999)					
						{
							$args=array(
							'orderby' => 'date',
							'order' => 'DESC',
              				'paged' => $paged,
							);
						}
						else
						{
							$args=array(
							'cat' => $termID,
							'orderby' => 'date',
							'order' => 'DESC',
              				'paged' => $paged,
							);						
						}
						
						$temp = $wp_query;  // assign orginal query to temp variable for later use   					
						$wp_query = new WP_Query($args); 

						//if have posts, loop posts
						if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				?>	
				<!--blog post one-->
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
				<?php endwhile; /*end while blog posts*/ else: ?>
					<p>Sorry, no posts found.</p>        
				<?php endif; ?>
        		<!--Pagination-->
				<?php		
					if (function_exists("pagination")) 
					{
					    pagination($temp->max_num_pages);
					} 
				?>
        <?php
					$wp_query = $temp;  //reset back to original query  
				?>
				<?php } /*end if blog style*/ ?>
				<?php endwhile; /*end while page posts*/ else: ?>

				<p>Sorry, no posts found.</p>

				<?php endif; ?>				

			</div>
		</div>
	</div>		

<?php get_footer(); ?>