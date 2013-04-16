<?php
/* Tile Block */
if(!class_exists('AQ_Tile_Block')) {
	class AQ_Tile_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Tile',
				'size' => 'span5',
			);
			
			//create the widget
			parent::__construct('AQ_Tile_Block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'img' => '',
				'height' => '',
				'crop' => 0,
				'link' => '#',
				'internal' => 0,
				'static' => 0
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);

			$height_options = array(
				'm' => 'Medium (135px)',
				'l' => 'Long (285px)',
				'xl' => 'Very long (435px)'
			);
			
			?>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('img') ?>">
					Upload an image<br/>
					<?php echo aq_field_upload('img', $block_id, $img) ?>
				</label>
				<?php if($img) { ?>
				<div class="screenshot">
					<img src="<?php echo $img ?>" />
				</div>
				<?php } ?>
			</p>
			<p class="description fourth">
				<label for="<?php echo $this->get_field_id('height') ?>">
					Height (optional)<br/>
					<?php echo aq_field_select('height', $block_id, $height_options, $height) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('link') ?>">
					Hyperlink (optional)<br/>
					<?php echo aq_field_input('link', $block_id, $link) ?>
				</label>
			</p>			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('crop') ?>">
					<?php echo aq_field_checkbox('crop', $block_id, $crop); ?>
					Crop Image?
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('internal') ?>">
					<?php echo aq_field_checkbox('internal', $block_id, $internal); ?>
					Select if the link is with-in the page?
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('static') ?>">
					<?php echo aq_field_checkbox('static', $block_id, $static); ?>
					Set Tile as static (no hover animation)?
				</label>
			</p>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			$width = aq_get_column_width($size);
			$crop = $crop ? true : false;
			$image = aq_resize($img, $width, $height, $crop);
			
			$output = '';
			$class = "tile";
			$span_bottom = "bottom:-36px;";
			if($static)
			{
				$class = "static_tile no_bg";
				$span_bottom = "bottom:0px;";
			}	
			if($internal)
				$class .= " internal";
			$output .= '<div class="tile_item '.$height.'"><a href="'.$link.'" class="'.$class.'">';
			if(!empty($title))
				$output .= '<span style="'.$span_bottom.'">'.$title.'</span>';
			$output .= '<img class="aq-block-img" src="'.$image.'" alt=""/></a></div>';

			echo $output;
		}			
	}
}