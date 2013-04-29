<?php
/*
*	Template part to show article meta information in article listing pages like 
*	index, page, archive, categories, tag, search etc
*/
?>
		<?php
			global $tmg_data;
			$icon_class = "icon-black";
			if(strtolower($tmg_data['skin']) == "dark")
				$icon_class = " icon-white";			
		?>
			<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php printf( __( '<i class="icon-th-large %1$s"></i> %2$s', 'tmg-framework' ), $icon_class, get_the_category_list( ', ' ) ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<i class="icon-tags %1$s"></i> %2$s', 'tmg-framework' ), $icon_class, $tags_list ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<i class="icon-comment <?php echo $icon_class;?>"></i>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'tmg-framework' ), __( '1 Comment', 'tmg-framework' ), __( '% Comments', 'tmg-framework' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'tmg-framework' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->