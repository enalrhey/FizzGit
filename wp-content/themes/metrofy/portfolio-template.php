<?php

/*
Template Name: Portfolio Template
*/
	get_header();
?>
<!--Content-->
	<div class="content">
		<div class=" band container">
			<h1 class="pageTitle"><?php the_title(); ?></h1>				
			<!--Content Area-->
			<div>
				<?php 
				$post_id = get_the_ID();
				$images = get_post_meta( $post_id, 'tmg_screenshot2', false ); 
				if( !empty($images) ) 
				{
		        	echo '<div class="flexslider" id="featured-work">';
		            echo '<ul class="slides">';
		           
					foreach ( $images as $image )
					{
						$src = wp_get_attachment_image_src( $image, 'large' );
						$src = $src[0];
						if($src != '')
		                	echo "<li><img src='{$src}' alt='' title=''/></li>";                
					}
					echo '</ul>';						            
		            echo '</div>';
				}
				?>				
				<!--portfolio navigation-->	
				<h3 class="sectionhead">
					<?php 
						$pageIconId = get_post_meta($post_id, "tmg_pageIcon", true);
    					$pageIconSrc = wp_get_attachment_image_src( $pageIconId, 'large' );
    					if(!empty($pageIconSrc[0]))
    					{
					?>
					<img src="<?php echo $pageIconSrc[0]; ?>" alt="" class="pageIcon"/>
					<?php } //end if empty?>Our Work</h3>								
				<?php get_template_part("portfolio", "section"); ?>
			</div>		
		</div>
	</div>	
<?php get_footer() ?>