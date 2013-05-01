<?php
/*
Plugin Name: Brankic Social Media Widget 
Plugin URI: http://www.brankic1979.com
Description: Showing social media icons - for more icons http://www.brankic1979.com/2011/12/free-social-media-icon-set/
Author: Brankic1979
Version: 1.8
Author URI: http://www.brankic1979.com/
*/
class BraSocialIconsWidget extends WP_Widget
{
	function BraSocialIconsWidget() {
		$widget_options = array(
		'classname'		=>		'bra-social-media-widget',
		'description' 	=>		'Showing social icons and URL to profile pages of the user '
		);
		
		parent::WP_Widget('bra_social_media_widget', 'Brankic Social Media Widget', $widget_options);
	}
	
	function widget( $args, $instance ) {
		extract ( $args, EXTR_SKIP );
		$title = ( $instance['title'] ) ? $instance['title'] : '';
        $bg_color = ( $instance['bg_color'] ) ? $instance['bg_color'] : '#ffffff'; 
        $icon_1_url = ( $instance['icon_1_url'] ) ? $instance['icon_1_url'] : '';
        $icon_2_url = ( $instance['icon_2_url'] ) ? $instance['icon_2_url'] : '';
        $icon_3_url = ( $instance['icon_3_url'] ) ? $instance['icon_3_url'] : '';
        $icon_4_url = ( $instance['icon_4_url'] ) ? $instance['icon_4_url'] : '';
        $icon_5_url = ( $instance['icon_5_url'] ) ? $instance['icon_5_url'] : '';
        $icon_6_url = ( $instance['icon_6_url'] ) ? $instance['icon_6_url'] : '';
        $icon_7_url = ( $instance['icon_7_url'] ) ? $instance['icon_7_url'] : '';
        $icon_8_url = ( $instance['icon_8_url'] ) ? $instance['icon_8_url'] : '';
		    $icon_9_url = ( $instance['icon_9_url'] ) ? $instance['icon_9_url'] : '';
		    $icon_10_url = ( $instance['icon_10_url'] ) ? $instance['icon_10_url'] : '';
        $icon_11_url = ( $instance['icon_11_url'] ) ? $instance['icon_11_url'] : '';
        $icon_12_url = ( $instance['icon_12_url'] ) ? $instance['icon_12_url'] : '';
        $icon_13_url = ( $instance['icon_13_url'] ) ? $instance['icon_13_url'] : '';
        $icon_14_url = ( $instance['icon_14_url'] ) ? $instance['icon_14_url'] : '';
        $icon_15_url = ( $instance['icon_15_url'] ) ? $instance['icon_15_url'] : '';
        $icon_16_url = ( $instance['icon_16_url'] ) ? $instance['icon_16_url'] : '';
        $icon_17_url = ( $instance['icon_17_url'] ) ? $instance['icon_17_url'] : '';
        $icon_18_url = ( $instance['icon_18_url'] ) ? $instance['icon_18_url'] : '';
        $icon_19_url = ( $instance['icon_19_url'] ) ? $instance['icon_19_url'] : '';
        $icon_20_url = ( $instance['icon_20_url'] ) ? $instance['icon_20_url'] : '';        
        
        $icon_1_path = ( $instance['icon_1_path'] ) ? $instance['icon_1_path'] : '';
        $icon_2_path = ( $instance['icon_2_path'] ) ? $instance['icon_2_path'] : '';
        $icon_3_path = ( $instance['icon_3_path'] ) ? $instance['icon_3_path'] : '';
        $icon_4_path = ( $instance['icon_4_path'] ) ? $instance['icon_4_path'] : '';
        $icon_5_path = ( $instance['icon_5_path'] ) ? $instance['icon_5_path'] : '';
        $icon_6_path = ( $instance['icon_6_path'] ) ? $instance['icon_6_path'] : '';
        $icon_7_path = ( $instance['icon_7_path'] ) ? $instance['icon_7_path'] : '';
        $icon_8_path = ( $instance['icon_8_path'] ) ? $instance['icon_8_path'] : '';
		    $icon_9_path = ( $instance['icon_9_path'] ) ? $instance['icon_9_path'] : '';
		    $icon_10_path = ( $instance['icon_10_path'] ) ? $instance['icon_10_path'] : '';
        $icon_11_path = ( $instance['icon_11_path'] ) ? $instance['icon_11_path'] : '';
        $icon_12_path = ( $instance['icon_12_path'] ) ? $instance['icon_12_path'] : '';
        $icon_13_path = ( $instance['icon_13_path'] ) ? $instance['icon_13_path'] : '';
        $icon_14_path = ( $instance['icon_14_path'] ) ? $instance['icon_14_path'] : '';
        $icon_15_path = ( $instance['icon_15_path'] ) ? $instance['icon_15_path'] : '';
        $icon_16_path = ( $instance['icon_16_path'] ) ? $instance['icon_16_path'] : '';
        $icon_17_path = ( $instance['icon_17_path'] ) ? $instance['icon_17_path'] : '';
        $icon_18_path = ( $instance['icon_18_path'] ) ? $instance['icon_18_path'] : '';
        $icon_19_path = ( $instance['icon_19_path'] ) ? $instance['icon_19_path'] : '';
        $icon_20_path = ( $instance['icon_20_path'] ) ? $instance['icon_20_path'] : '';        
        
        

		$root = plugin_dir_url( __FILE__ );
		echo $before_widget;
		echo $before_title . $title . $after_title;
        wp_enqueue_style("bra_social_media_plugin_css", $root."bra_social_media.css"); 
		?>
		<div class="social-bookmarks">                    
        <ul>
            <?php
            $i = 0;
            for ($i = 1 ; $i <= 20 ; $i++)
            {
                $icon_url = "icon_".$i."_url";
                $icon_path = "icon_".$i."_path";
                if ($$icon_url != "")
                { 
                    $icon_filename = $$icon_path;
                    $icon_filename = substr($icon_filename, 0, -4); 
                ?>
                <li style="background-color: <?php echo $bg_color; ?>" class="<?php echo $icon_filename; ?>"><a target="_blank" href="<?php echo $$icon_url; ?>"><?php echo $icon_filename; ?></a></li>
                <?php
                }
            }
            ?>                        
        </ul><!-- END UL-->
    </div><!--END SOCIAL BOOKMARKS-->
		<?php 
		echo $after_widget;
	}
	
	function form( $instance ) {
        $root = plugin_dir_url( __FILE__ );
        wp_enqueue_script("miniColors", $root."jquery.miniColors.min.js", array('jquery'));
        wp_enqueue_style("miniColors", $root."jquery.miniColors.css"); 
        
        if (!isset($instance['title'])) $instance['title'] = ""; 
        if (!isset($instance['bg_color'])) $instance['bg_color'] = "#ffffff"; 
        if (!isset($instance['icon_1_url'])) $instance['icon_1_url'] = "";
        if (!isset($instance['icon_1_path'])) $instance['icon_1_path'] = ""; 
        if (!isset($instance['icon_2_url'])) $instance['icon_2_url'] = "";
        if (!isset($instance['icon_2_path'])) $instance['icon_2_path'] = "";
        if (!isset($instance['icon_3_url'])) $instance['icon_3_url'] = "";
        if (!isset($instance['icon_3_path'])) $instance['icon_3_path'] = "";
        if (!isset($instance['icon_4_url'])) $instance['icon_4_url'] = "";
        if (!isset($instance['icon_4_path'])) $instance['icon_4_path'] = "";
        if (!isset($instance['icon_5_url'])) $instance['icon_5_url'] = "";
        if (!isset($instance['icon_5_path'])) $instance['icon_5_path'] = "";
        if (!isset($instance['icon_6_url'])) $instance['icon_6_url'] = "";
        if (!isset($instance['icon_6_path'])) $instance['icon_6_path'] = "";
        if (!isset($instance['icon_7_url'])) $instance['icon_7_url'] = "";
        if (!isset($instance['icon_7_path'])) $instance['icon_7_path'] = "";
        if (!isset($instance['icon_8_url'])) $instance['icon_8_url'] = "";
        if (!isset($instance['icon_8_path'])) $instance['icon_8_path'] = "";
    		if (!isset($instance['icon_9_url'])) $instance['icon_9_url'] = "";
        if (!isset($instance['icon_9_path'])) $instance['icon_9_path'] = "";
    		if (!isset($instance['icon_10_url'])) $instance['icon_10_url'] = "";
        if (!isset($instance['icon_10_path'])) $instance['icon_10_path'] = "";

        if (!isset($instance['icon_11_url'])) $instance['icon_11_url'] = "";
        if (!isset($instance['icon_11_path'])) $instance['icon_11_path'] = ""; 
        if (!isset($instance['icon_12_url'])) $instance['icon_12_url'] = "";
        if (!isset($instance['icon_12_path'])) $instance['icon_12_path'] = "";
        if (!isset($instance['icon_13_url'])) $instance['icon_13_url'] = "";
        if (!isset($instance['icon_13_path'])) $instance['icon_13_path'] = "";
        if (!isset($instance['icon_14_url'])) $instance['icon_14_url'] = "";
        if (!isset($instance['icon_14_path'])) $instance['icon_14_path'] = "";
        if (!isset($instance['icon_15_url'])) $instance['icon_15_url'] = "";
        if (!isset($instance['icon_15_path'])) $instance['icon_15_path'] = "";
        if (!isset($instance['icon_16_url'])) $instance['icon_16_url'] = "";
        if (!isset($instance['icon_16_path'])) $instance['icon_16_path'] = "";
        if (!isset($instance['icon_17_url'])) $instance['icon_17_url'] = "";
        if (!isset($instance['icon_17_path'])) $instance['icon_17_path'] = "";
        if (!isset($instance['icon_18_url'])) $instance['icon_18_url'] = "";
        if (!isset($instance['icon_18_path'])) $instance['icon_18_path'] = "";
        if (!isset($instance['icon_19_url'])) $instance['icon_19_url'] = "";
        if (!isset($instance['icon_19_path'])) $instance['icon_19_path'] = "";
        if (!isset($instance['icon_20_url'])) $instance['icon_20_url'] = "";
        if (!isset($instance['icon_20_path'])) $instance['icon_20_path'] = "";        

        $url = plugins_url("", __FILE__);
        $url = substr($url, strpos($url, "wp-content"));
        $icons_paths = glob("../$url/icons/*.*");
         
		?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">
        Title: 
        <input id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                value="<?php echo esc_attr( $instance['title'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('bg_color'); ?>">
        BG color (with #): 
        <input id="<?php echo $this->get_field_id('bg_color'); ?>"
                name="<?php echo $this->get_field_name('bg_color'); ?>"
                value="<?php echo esc_attr( $instance['bg_color'] ); ?>"
                class="color-picker" size="10"/>
        </label>
        </p>
        <p>
		<label for="<?php echo $this->get_field_id('icon_1_url'); ?>">
		URL 1: 
		<input id="<?php echo $this->get_field_id('icon_1_url'); ?>"
				name="<?php echo $this->get_field_name('icon_1_url'); ?>"
				value="<?php echo esc_attr( $instance['icon_1_url'] ); ?>"
                class="widefat"/>
		</label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_1_path'); ?>">
        Icon 1:
          <select name="<?php echo $this->get_field_name('icon_1_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_1_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_1_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_2_url'); ?>">
        URL 2: 
        <input id="<?php echo $this->get_field_id('icon_2_url'); ?>"
                name="<?php echo $this->get_field_name('icon_2_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_2_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_2_path'); ?>">
        Icon 2:
          <select name="<?php echo $this->get_field_name('icon_2_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_2_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_2_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_3_url'); ?>">
        URL 3: 
        <input id="<?php echo $this->get_field_id('icon_3_url'); ?>"
                name="<?php echo $this->get_field_name('icon_3_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_3_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_3_path'); ?>">
        Icon 3:
          <select name="<?php echo $this->get_field_name('icon_3_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_3_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_3_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_4_url'); ?>">
        URL 4: 
        <input id="<?php echo $this->get_field_id('icon_4_url'); ?>"
                name="<?php echo $this->get_field_name('icon_4_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_4_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_4_path'); ?>">
        Icon 4:
          <select name="<?php echo $this->get_field_name('icon_4_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_4_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_4_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_5_url'); ?>">
        URL 5: 
        <input id="<?php echo $this->get_field_id('icon_5_url'); ?>"
                name="<?php echo $this->get_field_name('icon_5_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_5_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_5_path'); ?>">
        Icon 5:
          <select name="<?php echo $this->get_field_name('icon_5_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_5_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_5_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_6_url'); ?>">
        URL 6: 
        <input id="<?php echo $this->get_field_id('icon_6_url'); ?>"
                name="<?php echo $this->get_field_name('icon_6_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_6_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_6_path'); ?>">
        Icon 6:
          <select name="<?php echo $this->get_field_name('icon_6_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_6_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_6_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_7_url'); ?>">
        URL 7: 
        <input id="<?php echo $this->get_field_id('icon_7_url'); ?>"
                name="<?php echo $this->get_field_name('icon_7_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_7_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_7_path'); ?>">
        Icon 7:
          <select name="<?php echo $this->get_field_name('icon_7_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_7_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_7_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_8_url'); ?>">
        URL 8: 
        <input id="<?php echo $this->get_field_id('icon_8_url'); ?>"
                name="<?php echo $this->get_field_name('icon_8_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_8_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('icon_8_path'); ?>">
        Icon 8:
          <select name="<?php echo $this->get_field_name('icon_8_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_8_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_8_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
		
        <p>
        <label for="<?php echo $this->get_field_id('icon_9_url'); ?>">
        URL 9: 
        <input id="<?php echo $this->get_field_id('icon_9_url'); ?>"
                name="<?php echo $this->get_field_name('icon_9_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_9_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_9_path'); ?>">
        Icon 9:
          <select name="<?php echo $this->get_field_name('icon_9_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_9_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_9_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>
        <!--URL + ICON-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_10_url'); ?>">
        URL 10: 
        <input id="<?php echo $this->get_field_id('icon_10_url'); ?>"
                name="<?php echo $this->get_field_name('icon_10_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_10_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_10_path'); ?>">
        Icon 10:
          <select name="<?php echo $this->get_field_name('icon_10_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_10_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_10_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>		

        <!--URL + ICON 10-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_10_url'); ?>">
        URL 10: 
        <input id="<?php echo $this->get_field_id('icon_10_url'); ?>"
                name="<?php echo $this->get_field_name('icon_10_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_10_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_10_path'); ?>">
        Icon 10:
          <select name="<?php echo $this->get_field_name('icon_10_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_10_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_10_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>        
        
        <!--URL + ICON 11-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_11_url'); ?>">
        URL 11: 
        <input id="<?php echo $this->get_field_id('icon_11_url'); ?>"
                name="<?php echo $this->get_field_name('icon_11_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_11_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_11_path'); ?>">
        Icon 11:
          <select name="<?php echo $this->get_field_name('icon_11_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_11_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_11_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 12-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_12_url'); ?>">
        URL 12: 
        <input id="<?php echo $this->get_field_id('icon_12_url'); ?>"
                name="<?php echo $this->get_field_name('icon_12_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_12_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_12_path'); ?>">
        Icon 12:
          <select name="<?php echo $this->get_field_name('icon_12_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_12_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_12_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 13-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_13_url'); ?>">
        URL 13: 
        <input id="<?php echo $this->get_field_id('icon_13_url'); ?>"
                name="<?php echo $this->get_field_name('icon_13_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_13_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_13_path'); ?>">
        Icon 13:
          <select name="<?php echo $this->get_field_name('icon_13_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_13_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_13_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 14-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_14_url'); ?>">
        URL 14: 
        <input id="<?php echo $this->get_field_id('icon_14_url'); ?>"
                name="<?php echo $this->get_field_name('icon_14_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_14_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_14_path'); ?>">
        Icon 14:
          <select name="<?php echo $this->get_field_name('icon_14_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_14_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_14_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 15-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_15_url'); ?>">
        URL 15: 
        <input id="<?php echo $this->get_field_id('icon_15_url'); ?>"
                name="<?php echo $this->get_field_name('icon_15_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_15_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_15_path'); ?>">
        Icon 15:
          <select name="<?php echo $this->get_field_name('icon_15_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_15_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_15_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 16-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_16_url'); ?>">
        URL 16: 
        <input id="<?php echo $this->get_field_id('icon_16_url'); ?>"
                name="<?php echo $this->get_field_name('icon_16_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_16_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_16_path'); ?>">
        Icon 16:
          <select name="<?php echo $this->get_field_name('icon_16_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_16_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_16_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 17-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_17_url'); ?>">
        URL 17: 
        <input id="<?php echo $this->get_field_id('icon_17_url'); ?>"
                name="<?php echo $this->get_field_name('icon_17_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_17_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_17_path'); ?>">
        Icon 17:
          <select name="<?php echo $this->get_field_name('icon_17_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_17_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_17_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 18-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_18_url'); ?>">
        URL 18: 
        <input id="<?php echo $this->get_field_id('icon_18_url'); ?>"
                name="<?php echo $this->get_field_name('icon_18_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_18_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_18_path'); ?>">
        Icon 18:
          <select name="<?php echo $this->get_field_name('icon_18_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_18_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_18_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>           
        
        <!--URL + ICON 19-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_19_url'); ?>">
        URL 19: 
        <input id="<?php echo $this->get_field_id('icon_19_url'); ?>"
                name="<?php echo $this->get_field_name('icon_19_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_19_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_19_path'); ?>">
        Icon 19:
          <select name="<?php echo $this->get_field_name('icon_19_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_19_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_19_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p> 

        <!--URL + ICON 20-->
        <p>
        <label for="<?php echo $this->get_field_id('icon_20_url'); ?>">
        URL 20: 
        <input id="<?php echo $this->get_field_id('icon_20_url'); ?>"
                name="<?php echo $this->get_field_name('icon_20_url'); ?>"
                value="<?php echo esc_attr( $instance['icon_20_url'] ); ?>"
                class="widefat"/>
        </label>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('icon_20_path'); ?>">
        Icon 20:
          <select name="<?php echo $this->get_field_name('icon_20_path'); ?>" 
                  id="<?php echo $this->get_field_id('icon_20_path'); ?>"
                class="widefat">
                <option value="">Select Icon</option>
          <?php 
            foreach ($icons_paths as $icon_path)
              {
                  $icon_path = $root.substr($icon_path, 3);
                  $icon_path_ = substr($icon_path, strpos($icon_path, "/icons/") + 7);
              ?>
                <option <?php if ($instance['icon_20_path'] == $icon_path_) echo 'selected="selected"' ?> value="<?php echo $icon_path_; ?>"><?php echo $icon_path_; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
        </p>                                                       
		<?php 
	}
	
}
	
function bra_social_media_widget_init() {
	register_widget("BraSocialIconsWidget");
}
add_action('widgets_init','bra_social_media_widget_init');