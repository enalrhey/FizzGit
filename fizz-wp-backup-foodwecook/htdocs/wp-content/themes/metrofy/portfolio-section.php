<?php
					global $post_id;					
					$termID = get_post_meta($post_id, "tmg_portfolioCategory", true);
					$termchildren = get_term_children( $termID, 'portfolio_types' );
					$k = 0;
					?>
					<div class="clearfix">										
						<div class="section-nav filterable">    
							<ul id="portfolio-nav" data-option-key="filter">
								<li class="all current"><a href="#" data-option-value="*">All</a></li>	
								<?php
									if($termID < 9999)
									{
										foreach ($termchildren as $child) 
										{
											$term = get_term_by( 'id', $child, 'portfolio_types' );
											$k++;
								?>
											<li class="<?php echo $term->slug; ?>">
												<a href="#" data-option-value="<?php echo '.'.$term->slug; ?>"><?php echo $term->name; ?></a>
											</li>	
								<?php 
										}	//end foreach
									}//end if
									else
									{
										$k++;
										$args = array( 'taxonomy' => 'portfolio_types');
    									$terms = get_terms('portfolio_types', $args);		
    									$count = count($terms);
										if ( $count > 0 )
									    {        
									        foreach ( $terms as $term ) 
									        {
									        	$k++;
					        	?>
									            <li class="<?php echo $term->slug; ?>">
									            	<a href="#" data-option-value="<?php echo '.'.$term->slug; ?>"><?php echo $term->name; ?></a>
									            </li>	
						        <?php 		}
									    }    									
									}
								?>								
							</ul><!--end portfolio navigation-->
						</div>
					</div>				
					<?php
					if ($k == 0) { ?>
					    <script type="text/javascript">
					    $(document).ready(function($){
					        $('#portfolio-nav').remove();
					    });
					    </script>
					<?php } ?>								
				<!--portfolio items-->
				<?php
					/*Get portfolio items*/	
					$posts_per_page = get_post_meta( $post_id, 'tmg_numberOfItems', true );
					if(empty($posts_per_page))
						$posts_per_page = 9;

					if($termID < 9999)
					{
						$args=array(
					    'tax_query' => array(
					        array(
					            'taxonomy' => 'portfolio_types',
					            //'field' => $termID
					            'terms' => $termID
					        )
					    ),
					    'post_type' => 'portfolio',
					    'orderby' => 'date',
					    'order' => 'DESC',
					    'posts_per_page' => $posts_per_page
					    );
					}
					else
					{								
						$args=array(
					    'post_type' => 'portfolio',
					    'orderby' => 'date',
					    'order' => 'DESC',
					    'posts_per_page' => $posts_per_page
					    );	
					}		
					$itemIndex = 0;
					$temp = $wp_query;  // assign orginal query to temp variable for later use   
					$wp_query = new WP_Query($args); 
					if(have_posts()):?>
						<div id="portfolio-section">
							<ul id="portfolio"> 
						<?php
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$itemIndex++;
							$columnName = "five columns";
							/*
							if($itemIndex % 3 == 0)
								$columnName = "five columns";
							if(($itemIndex-1) % 3 == 0)
								$columnName = "five columns";*/

							//get portfolio item format
							$format = get_post_format();
							if( false === $format ) { $format = 'standard';; }  													

							//get featured image
							if (function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) 
							{
								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');							
								
								$featured_src = $thumbnail[0];
								$hyperlink_src = get_permalink();
								$gallery_name = '';
								$link_class_name = '';

								if($format == 'gallery')
								{
									//get first valid image source to set as the featured image hyperlink target
									$link_class_name = 'prettyPhoto';
									$gallery_Images = get_post_meta( get_the_ID(), 'tmg_screenshot2', false );
									if(!empty($gallery_Images) )	
									{		
										foreach ( $gallery_Images as $image )
										{						
											$hyperlink_src = wp_get_attachment_image_src( $image, 'large' );
											if($hyperlink_src[0] != '')
											{
												$hyperlink_src = $hyperlink_src[0];
												$gallery_name = 'prettyPhoto['.get_the_title().']';
												break;
											}
										}	
									}
									else
									{
										$format = 'standard';
									}								
								}
								else if($format == 'video')
								{
									$hyperlink_src = get_post_meta(get_the_ID(), 'tmg_video_link', false);
									$hyperlink_src = $hyperlink_src[0];
									$gallery_name = 'prettyPhoto';
									$link_class_name = 'prettyPhoto';
								}

								//fallback on error getting gallery image source
								if($hyperlink_src == '')
								{
									$hyperlink_src = get_permalink();
									$format = 'standard';
									$link_class_name = '';
								}	

								if($format == 'standard')
									$link_class_name = '';

								// get the portfolio cats
						        $terms = get_the_terms( $post->ID, 'portfolio_types' );                           
						        if ( $terms && ! is_wp_error( $terms ) ) : 
						            $names = array();
						            $slugs = array();
						            foreach ( $terms as $term ) {
						                $names[] = $term->name;
						                $slugs[] = $term->slug;
						            }                                
						            $name_list = join( ", ", $names );
						            $display_name_list = join( " | ", $names );
						            $slug_list = join( " ", $slugs ); 
						        endif;
					        ?>
								<li class="portfolio-item <?php echo $slug_list.' '.$columnName;?>" data-type="<?php echo $slug_list; ?>" data-category="<?php echo $slug_list; ?>">  
									<div class="inner-item" style="display: block; float: left; ">
										<a href="<?php echo $hyperlink_src; ?>"  
										class="<?php echo $link_class_name; ?>" title="<?php the_title();?>" rel="<?php echo $gallery_name; ?>">
											<img src="<?php echo $featured_src;?>" alt="">
										</a>	
										<?php if($format == 'gallery') {
												for ($i=1; $i<count($gallery_Images); $i++)
												{
													$image_src = wp_get_attachment_image_src( $gallery_Images[$i], 'large' );
													if($image_src[0] != '')
													{
													?>
														<a href="<?php echo $image_src[0]; ?>"  class="prettyPhoto"
										 					title="<?php the_title();?>" rel="<?php echo $gallery_name; ?>"></a>
													<?php
													}//end if empty src
												}//end for										
											}//end if gallery
										?>
										<a href="<?php the_permalink(); ?>" >
											<h4 style="bottom: 0px; "><?php echo $display_name_list;?></h4>
										</a>
										<div class="text" style="visibility: visible; overflow: hidden; height: 0px; ">
											<a href="<?php the_permalink(); ?>" >
												<h3><?php the_title(); ?></h3>											
												<p>
													<?php echo get_post_meta(get_the_ID(), 'tmg_excerpt', true); ?>
												</p>
											</a>
										</div>							
									</div> 
								</li>  
							<?php } //end if image
						endwhile;?>
							</ul>
						</div>	<!--end sixteen columns-->
					<?php	
					endif;
				?>