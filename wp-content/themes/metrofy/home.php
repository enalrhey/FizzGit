<?php get_header() ?>
	
	<!--end band-->
	<!--Featured Slider-->
	<?php 		
		$slider_layout = $tmg_data['slider_layout']; //get slider layout		

		if ($slider_layout == 'static') {
			$staticImage = $tmg_data['staticImage']; 
			$staticImage_LinkTo = $tmg_data['staticImage_LinkTo'];
			$isFullWidth = $tmg_data['staticImageFullWidth'];

			if(strtolower($isFullWidth) == "fullwidth")
				$featured_img_class = "fullwidth_img";
			else
				$featured_img_class = "featured_img";
			?>			
			<div class="white <?php echo $featured_img_class;?>">
				<div class="tiles_hub">
				<div class="internal get_fizz_button" id="header_CTA">
					<a href="#store">Order Fizz Here!</a>
				</div>			
					<?php if(!empty($staticImage_LinkTo)){?>
						<a href="<?php echo $staticImage_LinkTo?>" alt="">				
							<img src="<?php echo $staticImage; ?>" alt="" class="<?php echo $tmg_data['staticImageFullWidth']; ?>"
							title=""/>		
						</a>	
					<?php } else { ?>
						<img src="<?php echo $staticImage; ?>" alt="" class="<?php echo $tmg_data['staticImageFullWidth']; ?>"
							title=""/>	
					<?php }//end if else	?>
				</div>
			</div>
		<?php
		} else if($slider_layout == 'slider') {
			$slides = $tmg_data['mainSlider']; //get the slides array
			$sliderWidth = $tmg_data['sliderWidth'];

			$slider_padding = "boxed";
			if(strtolower($sliderWidth) == "fullwidth")
				$slider_padding = "fullwidth_slider";
		?>
			<div class="content white <?php echo $slider_padding;?>">
				<div class="container tiles_hub <?php echo strtolower($sliderWidth);?>">			
					<div id="slider" class="flexslider_small">
						<ul class="slides">
							<?php
							foreach ($slides as $slide) {?>
								<li>
									<a href="<?php echo $slide['link'];?>">
										<img src="<?php echo $slide['url']; ?>" alt="" 
											title="<?php echo $slide['title'];?>" />						
									</a>
								</li>						
							<?php }	?>					
						</ul>		
					</div>			
				</div>
			</div>
		<?php
		} else if($slider_layout == 'slider_tiles'){
			$slides = $tmg_data['miniSlider']; //get the slides array
			$tile1 = $tmg_data['sl_tile1'];
			$tile2 = $tmg_data['sl_tile2'];
			$tile3 = $tmg_data['sl_tile3'];
			$tile4 = $tmg_data['sl_tile4'];			
		?>

		    <div class="content white boxed">
				<div class="container tiles_hub">			
					<div id="slider" class="flexslider_small">
						<ul class="slides">
							<?php
							foreach ($slides as $slide) {?>
								<li>
									<a href="<?php echo $slide['link'];?>">
										<img src="<?php echo $slide['url']; ?>" alt="" 
											title="<?php echo $slide['title'];?>" />						
									</a>						
								</li>						
							<?php }	?>					
						</ul>		
					</div>			
				</div>
				<div class="container tiles_hub">
					<div class="tile_item one_fourth">			
						<?php
						foreach ($tile1 as $tile) {?>
						<a href="<?php echo $tile['link'];?>" class="tile">
							<span><?php echo $tile['title'];?></span>
							<img src="<?php echo $tile['url'];?>" class="tile_img" alt="">
						</a>
						<?php }	?>					
					</div>
					<div class="tile_item one_fourth">			
						<?php
						foreach ($tile2 as $tile) {?>
						<a href="<?php echo $tile['link'];?>" class="tile">
							<span><?php echo $tile['title'];?></span>
							<img src="<?php echo $tile['url'];?>" class="tile_img" alt="">
						</a>
						<?php }	?>					
					</div>	
					<div class="tile_item one_fourth">			
						<?php
						foreach ($tile3 as $tile) {?>
						<a href="<?php echo $tile['link'];?>" class="tile">
							<span><?php echo $tile['title'];?></span>
							<img src="<?php echo $tile['url'];?>" class="tile_img" alt="">
						</a>
						<?php }	?>					
					</div>					
					<div class="tile_item one_fourth last">			
						<?php
						foreach ($tile4 as $tile) {?>
						<a href="<?php echo $tile['link'];?>" class="tile">
							<span><?php echo $tile['title'];?></span>
							<img src="<?php echo $tile['url'];?>" class="tile_img" alt="">
						</a>
						<?php }	?>					
					</div>	
				</div>
		    </div>
		<?php
 		} else if($slider_layout == 'portfolio'){
			# code...			
		}		
	?>

  	<!--Pages on HOME-->
<?php
$args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => '-1'
  );
$main_loop_index = 0;
$main_query = new WP_Query($args); 
if( have_posts() ) : 
    while ($main_query->have_posts()) : $main_query->the_post();

    global $post;

    $main_loop_index += 1;

	$main_padding_bottom = "";
    $featured_section = "featured_section";
    if($slider_layout == "from_page" && $main_loop_index == 1)
		$main_padding_bottom = "featured_section_from_page";

    $post_name = $post->post_name;
    
    $post_id = get_the_ID();
    
    $separate_page = get_post_meta($post_id, "tmg_showOnHome", true); 
    if ($separate_page != "n")
    {    	
    	$pageIconId = get_post_meta($post_id, "tmg_pageIcon", true);

    	$pageIconSrc = wp_get_attachment_image_src( $pageIconId );

    	$useCustomStyle = get_post_meta($post_id, "tmg_section_use_custom", true);
    	$sectionSkinStyle = '';
    	if($useCustomStyle == "yes")
    	{
			$sectionSkinStyle = get_post_meta($post_id, "tmg_section_text_color", true); 
    	}

?>
	<div class="band <?php echo $main_padding_bottom.' '.$sectionSkinStyle; ?> home_page_section" id="<?php echo the_slug(); ?>">
	
		<div class="container">			
			<?php
				$section_start = "";
				$show_title = get_post_meta($post_id, "tmg_showTitle", true); 
				$add_top_padding = "";
				if($show_title != "no")
				{
			?>
			<h2 class="sectionhead">  
				<?php if(!empty($pageIconSrc)){ ?>      
					<img src="<?php echo $pageIconSrc[0]; ?>" alt="" class="pageIcon"/>
				<?php } ?>
				<?php the_title(); ?>
			</h2>
			<?php 
				}//end if show title
				else
				{
					if($main_loop_index == 1)
						$section_start = "home_section";
					else
						$section_start = "home_section_repeat";
				}
			 ?>
			<div class="<?php echo $section_start;?>">	
                <?php
                $sectionStyle = get_post_meta($post_id, "tmg_homeSectionStyle", true);
			    if ($sectionStyle == "portfolio")
			    {
			    ?>
			    	<h4 class="sub-meta"><?php echo get_the_content(); ?></h4>
			    <?php 
			    	get_template_part("portfolio", "section");
				} //end if portfolio template
				else if($sectionStyle == "blog")
				{
					echo "<div id='blog-section-home'>"; //container div
					$termID = get_post_meta($post_id, "tmg_blogCategory", true);

					$posts_per_page = get_post_meta( $post_id, 'tmg_numberOfItems', true );
					if(empty($posts_per_page))
						$posts_per_page = 4;
					
					//var $args;
					if($termID == 9999)					
					{
						$args=array(
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $posts_per_page,
						);
					}
					else
					{
						$args=array(
						'cat' => $termID,
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $posts_per_page,
						);						
					}
					
					$temp = $wp_query;  // assign orginal query to temp variable for later use   					
					$wp_query = new WP_Query($args); 

					$loop_index = 0;
					//if have posts, loop posts
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 	
					$loop_index++;
					$add_last = "";
					if($loop_index % 2 == 0)
						$add_last = "last";
					else
						$add_last = "";				
				?>
					<div class="one_half <?php echo $add_last;?>">
						<article>
							<?php
							$has_post_thumbnail = false;
							$relative_class = 'relative';
							if (function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) {

								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								
								if(!empty($thumbnail[0])){
									$has_post_thumbnail = true;
									$relative_class = '';
								}
							}
							?>
							<a href="<?php the_permalink(); ?>" class="title-link" 
								title="Permalink to <?php the_title(); ?>" rel="bookmark">
								<!--<h4 class="heading"><p><?php the_title(); ?></p></h4>-->
								<p class="heading <?php echo $relative_class?>"><?php the_title(); ?></p>
							</a>
							<h5 class="heading <?php echo $relative_class?>">
								<?php the_category(', '); ?>
							</h5>
							
								<?php							
									if($has_post_thumbnail){
								?>
									<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>">
										<img src="<?php echo $thumbnail[0]; ?>" class="screen" alt="img-template">
									</a>
								<?php
									} //endif has_post_thumbnail
									else
									{
								?>
									<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>">
										<div class="empty_image"></div>
									</a>
								<?php }?>
							
							<div class="entry-content <?php echo $relative_class?>">
								<?php
									//$pos = strpos($post->post_content, '<!--more-->');
	                				//if ($pos) the_content(''); else 
									/*Always show excerpt on home page*/
	                				the_excerpt(); 
								?>
							</div>
						</article>
					</div>

					
				<?php
					endwhile;
					else: echo "<p>Sorry, no posts found.</p>"; endif;
					$wp_query = $temp;  //reset back to original query
					echo "</div>"; //end container div
				} //end if blog template
				else	
				{		
				?>
				<div class="justify">
				<?php			
					the_content();					
				?>	           
				</div>
				<?php }//end else ?>
			</div><!--end sixteen-->			
		</div><!--end container-->
			
	</div><!--end band-->
	<?php
    } //end if 'Yes'
    ?>    
    <?php    
    endwhile;
    endif; 
    ?>
	<?php get_footer(); ?>