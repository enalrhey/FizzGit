<?php
/*
	The loop that displays posts in thumbnail style.

	See http://codex.wordpress.org/Function_Reference/get_template_part for more information 
	on how this will be used.
*/
?>
		
		<?php 
			$class_name = "";
			if (function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) 
			{
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
				if(!empty($thumbnail[0]))
				{
					$class_name = "two_thirds last";
		?>
					<div class="one_third">
						<img src="<?php echo $thumbnail[0]; ?>" alt="" class="thumbnail"/>	
					</div>
		<?php 
				}//end if thumbnail not empty
			 }//end if thumbnail exists				
		?>						
		<div class="<?php echo $class_name;?>">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(__('Read more...', 'tmg-framework' ));?>			
		</div>