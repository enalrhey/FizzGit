<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//header social icons
		$of_header_icon_options = array(
			"Facebook",
			"Twitter",
			"GooglePlus",
			"LinkedIn",
			"Flickr"); 
		//$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$url =  ADMIN_DIR . 'assets/images/';
$imagepath =  get_template_directory_uri() . '/admin/images/';

	//General Styles - Logo, Background
	$of_options[] = array( "name" => "General",
						"type" => "heading");
							
	$of_options[] = array( "name" => "Logo Image",
						"desc" => "Upload your logo image.",
						"std" => "",
						"id" => "logo",
						"type" => "media");
						
	$of_options[] = array( "name" => "Background Skin",
						"desc" => "Select Dark or Light skin.",
						"id" => "skin",
						"std" => "dark",
						"type" => "images",
						"options" => array(
							'dark' => $imagepath . 'dark.jpg',
							'light' => $imagepath . 'light.jpg'));

	$of_options[] = array( "name" => "Theme Color",
						"desc" => "Select primary theme color.",
						"id" => "themeColor",
						"std" => "red",
						"type" => "images",
						"options" => array(
							'red' => $imagepath . 'red.jpg',
							'blue' => $imagepath . 'blue.jpg',
							'yellow' => $imagepath . 'yellow.jpg',
							'purple' => $imagepath . 'purple.jpg',
							'green' => $imagepath . 'green.jpg'));						
	
	$of_options[] = array( "name" => "Footer Fine Print Left",
						"desc" => "HTML or text to be inserted into the very bottom after the widgets, to the left.",
						"id" => "footer_text1",
						"std" => "",
						"type" => "textarea"); 
            
	$of_options[] = array( "name" => "Footer Fine Print Right",
						"desc" => "HTML or text to be inserted into the very bottom after the widgets, to the right.",
						"id" => "footer_text2",
						"std" => "",
						"type" => "textarea");             
						
	$of_options[] = array( "name" => "Tracking Code",
						"desc" => "Paste your Google Analytics (or other) tracking code here.",
						"id" => "tracking_code",
						"std" => "",
						"type" => "textarea"); 

	//Header Social Icons
	$of_options[] = array( "name" => "Header Social Icons",
						"type" => "heading");

	$of_options[] = array( "name" => "Social Icon 1",
						"desc" => "Select first social icon.",
						"id" => "social_icon_1",
						"std" => "Facebook",	
						"type" => "select",
						"options" => $of_header_icon_options); 

	$of_options[] = array( "name" => "Hyperlink for Social Icon 1",
						"desc" => "Specify hyperlink for first social icon.",
						"id" => "social_icon_1_link",
						"std" => "#",	
						"type" => "text"); 

	$of_options[] = array( "name" => "Social Icon 2",
						"desc" => "Select second social icon.",
						"id" => "social_icon_2",
						"std" => "Twitter",	
						"type" => "select",
						"options" => $of_header_icon_options); 

	$of_options[] = array( "name" => "Hyperlink for Social Icon 2",
						"desc" => "Specify hyperlink for second social icon.",
						"id" => "social_icon_2_link",
						"std" => "#",	
						"type" => "text"); 

	$of_options[] = array( "name" => "Social Icon 3",
						"desc" => "Select third social icon.",
						"id" => "social_icon_3",
						"std" => "Flickr",	
						"type" => "select",
						"options" => $of_header_icon_options); 		
	
	$of_options[] = array( "name" => "Hyperlink for Social Icon 3",
						"desc" => "Specify hyperlink for third social icon.",
						"id" => "social_icon_3_link",
						"std" => "#",	
						"type" => "text"); 
						
	//Layout Settings
	$of_options[] = array( "name" => "Layout Settings",
						"type" => "heading");
																	

	$of_options[] = array( "name" => "Blog Layout",
						"desc" => "Select a blog posts position (thumbnails or featured pics).",
						"id" => "blog_layout",
						"std" => "thumbnails",
						"type" => "images",
						"options" => array(
							'thumbnails' => $imagepath . 'blog1.jpg',
							'featured' => $imagepath . 'blog2.jpg')
						);					
	
	$of_options[] = array( "name" => "Featured Section Style",
						//"desc" => "Select a layout. <hr>1. <strong>Static image</strong> with optional hyperlink and overlay text<br/>2. <strong>Slider</strong> Image Slideshow with hyperlinks<br />3. <strong>Slider + Tiles</strong> Slideshow with featured tiles <br />4. <strong>Tiles Layout</strong> ideal for both Portfolio and Featured articles",
						"desc" => "Select a layout. <hr>1. <strong>Static image</strong> with optional hyperlink and overlay text<br/>2. <strong>Slider</strong> Image Slideshow with hyperlinks<br />3. <strong>Slider + Tiles</strong> Slideshow with featured tiles<br />4. <strong>Create from page</strong> Show first home page section as featured",
						"id" => "slider_layout",
						"std" => "from_page",						
						"type" => "images",
						"options" => array(
							'static' => $imagepath . 'static.png',
							'slider' => $imagepath . 'slider.png',
							'slider_tiles' => $imagepath . 'slider_tiles.png',							
							'from_page' => $imagepath . 'use_page.png'
							)
						);
	
	//Static Image Settings tab
	$of_options[] = array( "name" => "Featured - Static Image",
						"type" => "heading");
						
	$of_options[] = array( "name" => "Static Image Settings",
						"id" => "staticimagesettings",
						"std" => "The following are the settings required for showing a Static Image in Featured Section. <br/> <strong>You can skip these settings if you have NOT selected <font color='red'>Static Image</font> in Layout Settings.</strong>",
						"type" => "info");
						
	$of_options[] = array( "name" => "Header Image",
						"desc" => "Select or upload an image",		
						"std" => "",				
						"id" => "staticImage",
						"type" => "media"); 

	$of_options[] = array( "name" => "Header Image Width",
						"desc" => "Full width or Centered",						
						"id" => "staticImageFullWidth",
						"type" => "radio",
						"options" => array(
							'fullwidth' => 'Full Width',
							'featured' => 'Featured Centered',
							),
						"std"	=> "featured"
						); 	
						
	$of_options[] = array( "name" => "Image Hyperlink (Optional)",
						"desc" => "Set a target page to navigate to on clicking the image.",
						"id" => "staticImage_LinkTo",
						"std" => "",						
						"type" => "text"); 
	/*					
	$of_options[] = array( "name" => "Overlay Text (Optional)",
						"desc" => "Overlay text for the image. HTML allowed.",
						"id" => "staticImage_Overlay",						
						"type" => "textarea"); 	*/	
	//Slider Settings tab
	$of_options[] = array( "name" => "Featured - Slider",
						"type" => "heading");
						
	$of_options[] = array( "name" => "Slider Settings",
						"id" => "slidersettings",
						"std" => "Use the following settings for creating the slider. <br/> <strong>You can skip these settings if you have NOT selected <font color='red'>Slider</font> in Layout Settings.</strong>",						
						"type" => "info");

	$of_options[] = array( "name" => "Header Image Width",
						"desc" => "Full width or Centered",						
						"id" => "sliderWidth",
						"type" => "radio",
						"options" => array(
							'fullwidth' => 'Full Width',
							'featured' => 'Boxed',
							),
						"std"	=> "featured"
						); 					

	$of_options[] = array( "name" => "Main Slider",
						"desc" => "You may create as many slides you need.",						
						"id" => "mainSlider",
						"std" => "",
						"type" => "slider"); 
	//Slider + Tiles Settings Tab
	$of_options[] = array( "name" => "Featured - Slider and Tiles",
						"type" => "heading");
						
	$of_options[] = array( "name" => "Slider Tiles Settings",
						"id" => "slidertilessettings",
						"std" => "Use the following settings for creating the slider and tiles for Slider Area. <br/> <strong>You can skip these settings if you have NOT selected <font color='red'>Slider + Tiles</font> in Layout Settings.</strong>",					
						"type" => "info");
						
	$of_options[] = array( "name" => "Slider",
						"desc" => "<img src=".$imagepath . 'slider_tiles0.png'."></img> <br/>You may create as many slides you need. You can also change the order.",						
						"id" => "miniSlider",
						"std" => "",
						"type" => "slider"); 	
						
	$of_options[] = array( "name" => "Tiles",
						"desc" => "<img src=".$imagepath . 'slider_tiles1.png'."></img>",
						"id" => "sl_tile1",
						"caption" => "Tile 1",
						"std" => "",
						"type" => "tiles"); 
						
	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'slider_tiles2.png'."></img>",		
						"id" => "sl_tile2",
						"caption" => "Tile 2",
						"std" => "",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'slider_tiles3.png'."></img>",			
						"id" => "sl_tile3",
						"caption" => "Tile 3",
						"std" => "",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'slider_tiles4.png'."></img>",			
						"id" => "sl_tile4",
						"caption" => "Tile 4",
						"std" => "",
						"type" => "tiles"); 
						
	//Featured tiles layout tab
	/*
	$of_options[] = array( "name" => "Featured - Tiles Layout",
						"type" => "heading");
						
	$of_options[] = array( "name" => "Tiles Layout Settings",
						"std" => "Use the following settings for creating Tiles Layout for Slider Area. <br/> <strong>You can skip these settings if you have NOT selected <font color='red'>Tiles Layout</font> in Layout Settings.</strong>",					
						"type" => "info");
						
	$of_options[] = array( "name" => "Tiles",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles1.png'."></img>",
						"id" => "p_tile1",
						"caption" => "Tile 1",
						"type" => "tiles"); 
						
	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles2.png'."></img>",		
						"id" => "p_tile2",
						"caption" => "Tile 2",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles3.png'."></img>",			
						"id" => "p_tile3",
						"caption" => "Tile 3",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles4.png'."></img>",			
						"id" => "p_tile4",
						"caption" => "Tile 4",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles5.png'."></img>",
						"id" => "p_tile5",
						"caption" => "Tile 5",
						"type" => "tiles"); 
						
	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles6.png'."></img>",		
						"id" => "p_tile6",
						"caption" => "Tile 6",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles7.png'."></img>",			
						"id" => "p_tile7",
						"caption" => "Tile 7",
						"type" => "tiles"); 

	$of_options[] = array( "name" => "",
						"desc" => "<img src=".$imagepath . 'portfolio_tiles8.png'."></img>",			
						"id" => "p_tile8",
						"caption" => "Tile 8",
						"type" => "tiles"); 	

	*/					
	//Typography Settings Tab
	/*
	$of_options[] = array( "name" => "Typography",
						"type" => "heading");
	
	$of_options[] = array( "name" => "Main Body Typography",
					"desc" => "Body Typography.",
					"id" => "body_typography",
					"std" => array('size' => '14px','face' => 'helvetica','style' => 'normal','color' => '#444444'),
					"type" => "typography");			

						
	$of_options[] = array( "name" => "(H1) Heading Typography",
						"desc" => "Heading typography.",
						"id" => "h1_typography",
						"std" => array('size' => '40px','face' => 'helvetica','style' => 'normal','color' => '#181818'),
						"type" => "typography");
  
	$of_options[] = array( "name" => "(H2) Heading Typography",
					"desc" => "Heading Two typography.",
					"id" => "h2_typography",
					"std" => array('size' => '35px','face' => 'helvetica','style' => 'normal','color' => '#181818'),
					"type" => "typography");			
				  

	$of_options[] = array( "name" => "(H3) Heading Typography",
					"desc" => "Heading Three typography.",
					"id" => "h3_typography",
					"std" => array('size' => '28px','face' => 'helvetica','style' => 'normal','color' => '#181818'),
					"type" => "typography");
	
	$of_options[] = array( "name" => "(H4) Heading Typography",
					"desc" => "Heading Four typography.",
					"id" => "h4_typography",
					"std" => array('size' => '21px','face' => 'helvetica','style' => 'bold','color' => '#181818'),
					"type" => "typography");			
	
	$of_options[] = array( "name" => "(H5) Heading Typography",
 				"desc" => "Heading Five typography.",
 				"id" => "h5_typography",
 				"std" => array('size' => '17px','face' => 'helvetica','style' => 'bold','color' => '#181818'),
 				"type" => "typography");
	*/
// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
				
	}
}
?>
