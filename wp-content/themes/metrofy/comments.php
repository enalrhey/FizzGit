<?php
/**
* Comments Form and Comments
*/
	// Security Check - Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'tmg-framework');?></p>
<?php
		return;
	}

?>

	<div id="comments">
<?php if ( have_comments() ) : ?>
		<h5>
			<?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() , 'tmg-framework' ),
				number_format_i18n( get_comments_number() ), '<span class="normal">&quot;'.get_the_title().'&quot;</span>' );?>
		</h5>	
		<div id="previous-comments">
			<ul class="commentlist">
				<?php wp_list_comments("callback=tmg_comments"); ?>
			</ul>
		</div>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
<?php else : // this is displayed if there are no comments so far ?>
	 	<h5>No comments so far!</h5>
<?php endif; ?>
	</div>

	<div id="respond" class="w97">
		<?php comment_form(); ?>
	</div>