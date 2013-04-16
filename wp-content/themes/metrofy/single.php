<?php get_header() ?>
	<!--Content-->
	<div class="content">
		<div class=" band container">
			<h1 class="pageTitle"><?php echo get_the_title(); ?></h1>				
			<!--Content Area-->
			<div class="two_thirds" id="blog-section">
				<!--start the loop-->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!--blog post one-->
				<article class="post w97">
					<?php 
						//admin options - blog layout						
						if($tmg_data['blog_layout'] == "thumbnails") 
						{
							$class_name = "";
							if (function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) 
							{
								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								if(!empty($thumbnail[0]))
								{
									$class_name = "two_thirds last";
					?>
									<div class="one_third">
										<img src="<?php echo $thumbnail[0]; ?>" class="thumbnail" alt=""/>	
									</div>
					<?php 
								}//end if not empty
							}//end if has thumbnail
					?>						
							<div class="<?php echo $class_name;?>">
								<?php dimox_breadcrumbs(); ?>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>		
								<?php 
									global $tmg_data;
								    $icon_class = "icon-black";
								    if(strtolower($tmg_data['skin']) == "dark")
								        $icon_class = " icon-white";
								?>				
								<p class="meta">
									<i class="icon-user <?php echo $icon_class;?>"></i> <?php the_author_posts_link() ?> | <i class="icon-th-large <?php echo $icon_class;?>"></i> <?php the_category(', '); ?> | <i class="icon-calendar <?php echo $icon_class;?>"></i> 
									<span><?php the_time('F d, Y'); ?></span>
								</p>
							</div>
							<br class="clear"/>
							<?php get_template_part( "post", "format" );?>
							<div>
								<?php the_content(__('Read more...', 'tmg-framework' ));?>
							</div>
					<?php 
						} //endif thumbnail layout
					 	else //if featured 
					 	{ 
			 		?>
							<?php dimox_breadcrumbs(); ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>		
							<?php 
								global $tmg_data;
							    $icon_class = "icon-black";
							    if(strtolower($tmg_data['skin']) == "dark")
							        $icon_class = " icon-white";
							?>				
							<p class="meta">
								<i class="icon-user <?php echo $icon_class;?>"></i> <?php the_author_posts_link() ?> | <i class="icon-th-large <?php echo $icon_class;?>"></i> <?php the_category(', '); ?> | <i class="icon-calendar <?php echo $icon_class;?>"></i> 
								<span><?php the_time('F d, Y'); ?></span>
							</p>
					
						<?php get_template_part( "post", "format" );?>

						<!--If featured pic-->
						<?php
							$format = get_post_format(); 
				        	if( false === $format ) { $format = 'standard'; } 
							if ($format == 'standard' && function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) 
							{
								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						?>
								<img src="<?php echo $thumbnail[0]; ?>" alt="" class="featured"/>	
						<?php 
							} 
						?>
					
						<!--Article content-->
						<div class="article-content">
							<?php the_content(__('Read more...', 'tmg-framework' ));?>
						</div>
					<?php } //end if featured posts layout ?>
					<div class="author-meta">
						<h6>About the author</h6>						
						<p>
							<?php								
								$author_bio = get_the_author_meta('description'); 
								if(empty($author_bio))
									$author_bio = "This author has yet to write their bio."; 
								echo $author_bio;
							?>
						</p>
					</div>
				</article>		
					
				<?php endwhile; else: ?>
					<p>Sorry, no posts found.</p>
				<?php endif; ?>
				<!--Comments-->							
				<?php comments_template( '', true ); ?>
			</div>
			<!--Left Sidebar-->
			<?php get_sidebar(); ?>
		</div>
	</div>		
	<?php get_footer(); ?>