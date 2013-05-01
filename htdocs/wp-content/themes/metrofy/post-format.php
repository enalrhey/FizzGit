						<!--Get post format-->
						<?php 
				        	$format = get_post_format(); 
				        	if( false === $format ) { $format = 'standard'; } ?>
				        <!--If Slider-->
				        <?php
				        	if( $format == 'gallery') {
				        		$loader = 'ajax-loader.gif';
						        
				        		// get all of the slider images for the post
						        $attachments = get_post_meta( get_the_ID(), 'tmg_screenshot2', false );
						        //if attachments not empty
						        if( !empty($attachments) ) {
						            echo '<div class="flexslider">';
						            echo '<ul class="slides">';
						            	$i = 0;
							            foreach( $attachments as $attachment ) {
							                
							                $src = wp_get_attachment_image_src( $attachment, 'large' );
							                $caption = $attachment['post_excerpt'];
							                $src = $src[0];
							                $alt = ( !empty($attachment['post_content']) ) ? $attachment['post_content'] : $attachment['post_title'];
							                
							                if(!empty($src))
							                	echo "<li><img src='{$src}' alt='$alt' title='$caption'/></li>";
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