<?php
/*
	The loop that displays posts in featured style.

	See http://codex.wordpress.org/Function_Reference/get_template_part for more information 
	on how this will be used.
*/
?>

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-meta">
							<?php skeleton_posted_on(); ?>
						</div><!-- .entry-meta -->
					
						<!--Get post format-->
						<?php 
				        	$format = get_post_format(); 
				        	if( false === $format ) { $format = 'standard'; } ?>

				        <!--If Slider-->
				        <?php
				        	if( $format == 'gallery') {
				        		$loader = 'ajax-loader.gif';
				        		$thumbid = 0;
				        		$postid = $post->ID;
				        		// get the featured image for the post
						        //if( has_post_thumbnail($postid) ) {
						          //  $thumbid = get_post_thumbnail_id($postid);
						        //}
						        
				        		// get all of the attachments for the post
						        $args = array(
						            'orderby' => 'menu_order',
						            'post_type' => 'attachment',
						            'post_parent' => $postid,
						            'post_mime_type' => 'image',
						            'post_status' => null,
						            'numberposts' => -1
						        );
						        $attachments = get_posts($args);
						        //if attachments not empty
						        if( !empty($attachments) ) {
						            echo '<div class="flexslider">';
						            echo '<ul class="slides">';
						            	$i = 0;
							            foreach( $attachments as $attachment ) {
							                //if( $attachment->ID == $thumbid ) continue;
							                $src = wp_get_attachment_image_src( $attachment->ID, 'thumbnail-large' );
							                $caption = $attachment->post_excerpt;
							                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
							                echo "<li><img src='$src[0]' alt='$alt' title='$caption'/></li>";
							                $i++;
							            }
						            echo '</ul>';						            
						            echo '</div>';
						        }
						    }
				    	?>

						<!--If Video-->
						<?php if($format == 'video'){
							$embed = get_post_meta($post->ID, 'tmg_video', true);
							if( !empty($embed) ) {
								echo "<div class='video-container'>";
							    echo stripslashes(htmlspecialchars_decode($embed));
							    echo "</div>";
							}
						} 
						?>

						<!--If featured pic-->
						<?php if ($format == 'standard' && function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) {

							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
							?>

							<img src="<?php echo $thumbnail[0]; ?>" alt="" class="featured"></img>

						<?php } ?>

