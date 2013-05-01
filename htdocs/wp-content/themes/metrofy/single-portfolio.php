<?php get_header() ?>	
	<!--Content-->
	<div class="content">
		<div class="white band">
			<!--Content Area-->
			<!--Featured Work-->	
			<div class="container portfolio-header">				
				<h1 class="pageTitle"><?php the_title(); ?></h1>	
				<?php 
					//start the loop
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					//get post format
		        	$format = get_post_format(); 
		        	if( false === $format ) { $format = 'standard'; } 
		        	//if gallery
		        	if( $format == 'gallery') 
		        	{
				        $images = get_post_meta( get_the_ID(), 'tmg_screenshot2', false );
				        if( !empty($images) ) {
				        	echo '<div class="flexslider ten columns" id="featured-work-item">';
				            echo '<ul class="slides">';
				            
							foreach ( $images as $image )
							{
								$src = wp_get_attachment_image_src( $image, 'large' );
								$caption = $image['post_excerpt'];
								$src = $src[0];
								$alt = ( !empty($image['post_content']) ) ? $image['post_content'] : $image['post_title'];
								if(!empty($src)){
							?>
				                	<li>
			                			<a href="<?php echo $src; ?>" class="prettyPhoto" rel="prettyPhoto[<?php echo get_the_title(); ?>]">
			                				<img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" title="<?php echo $caption; ?>"/>
			                			</a>
		                			</li>
                			<?php
				            	}//end if
				            }//end for
							echo '</ul>';						            
				            echo '</div>';
						}
				    }

				    //if video
				    if($format == 'video')
				    {
						$video_embed = get_post_meta(get_the_ID(), 'tmg_video', true);
						
						if( !empty($video_embed) ) 
						{
							echo "<div class='video-container ten columns'>";
							echo stripslashes(htmlspecialchars_decode($video_embed));
						    echo "</div>";
						}
					} 

					//if single image
					if ($format == 'standard' && function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) 
					{
						$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						?>
						<div class="ten columns">
							<img src="<?php echo $thumbnail[0]; ?>" alt="" class="featured"/>	
						</div>
					<?php } //end if image 
	        	?>
			
				<div class="six columns last portfolio-item-aside">
					<h2><?php the_title(); ?></h2>
					<p>
						<?php echo get_post_meta(get_the_ID(), 'tmg_excerpt', true); ?>
					</p>
					
					<?php 
						$portfolio_link = get_post_meta(get_the_ID(), 'tmg_link', true);
						$portfolio_link_text = get_post_meta(get_the_ID(), 'tmg_link_text', true);
						$client_name = get_post_meta(get_the_ID(), 'tmg_clientname', true);
						if(!empty($client_name)){						
					?>	
						<h6><strong>Client</strong></h6>
						<h6> <?php echo $client_name; ?></h6>
					<?php 
						} 
						if(!empty($portfolio_link)){
					?>
						<h6 class='portfolio-meta-link'><strong>Links</strong></h6>
						<h6><a href="<?php echo esc_url($portfolio_link); ?>"><?php echo $portfolio_link_text; ?></a></h6>
					<?php
						}
					?>
				</div>
			</div><!--end container-->
		</div> <!--end white band-->

		<div class="band container">		

			<div class="sixteen columns portfolio-item-content">	

				<?php the_content(__('Read more...', 'tmg-framework' )); ?>		

				<?php endwhile; else: ?>
					<p>Sorry, no posts found.</p>
				<?php endif; ?>

			</div> <!--end div sixteen columns-->										

			<div id="related-works" class="sixteen columns">			
				<?php
					$backup = $post;

					$tags = wp_get_post_tags(get_the_ID());

					if ($tags) 
					{
						$tag_ids = array();
						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$related_args=array(
						'tag__in' => $tag_ids,
						'post_type' => 'portfolio',
						'post__not_in' => array(get_the_ID()),
						'posts_per_page'=>3,  // Number of related posts that will be shown.
						'ignore_sticky_posts'=>1
						);
						
						$my_query = new wp_query($related_args);

						if( $my_query->have_posts() ) 
						{
							echo '<h4>Related works</h4><ul>';
							while ($my_query->have_posts()) 
							{
								$my_query->the_post();
				?>
					<li class="one-third column">
						<a href="<?php the_permalink() ?>" class="tile" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<span><?php the_title(); ?></span>
							<?php the_post_thumbnail(); ?>
						</a>
					</li>					
				<?php
							}/*end while*/
							echo '</ul>';
						} 
					}/*end if tags*/
					$post = $backup;
					wp_reset_query();
				?>
			</div><!--end related works-->
		</div>
	</div>		



	<?php get_footer(); ?>