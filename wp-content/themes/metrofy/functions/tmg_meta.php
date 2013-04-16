<?php

/**
 * Registering meta boxes
 *
 * Al the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/
/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */

// Better has an underscore as last sign

$prefix = 'tmg_';

global $meta_boxes;

$meta_boxes = array();

//Slides Meta Box - for 'post', 'portfolio' and 'page'

$meta_boxes[] = array(
	'id'		=> 'slides',
	'title'		=> 'Slides',
	'pages'		=> array( 'portfolio', 'post' , 'page'),
	'fields'	=> array(			
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'	=> 'Slider Images <br/> <em>For featured portfolio slider, post with slider</em>',
			'desc'	=> 'Select slideshow/featured images.',
			'id'	=> "{$prefix}screenshot2",
			'type'	=> 'plupload_image',
		),
	)
);

$meta_boxes[] = array(
	'id'		=> 'backgroundStyles',
	'title'		=> 'Custom page background style',
	'pages'		=> array( 'page'),
	'fields'	=> array(			
        array(
            "name"      => "Use custom styles for section?",
            'id'		=> "{$prefix}section_use_custom",
            'type'		=> 'radio',
			// Array of 'key' => 'value' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'no'			=> 'No',
				'yes'			=> 'Yes',
			),
			'std'		=> 'no',
        ),
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'	=> 'Background image',
			'desc'	=> 'Select a background image.',
			'id'	=> "{$prefix}section_background_url",
			'type'	=> 'plupload_image',
			'max_file_uploads' => 1,
		),
        array(
            "name"      => "Background repeat",
            'id'		=> "{$prefix}section_background_repeat",
            "desc"    	=> "Default is Repeat-Both",
            'type'		=> 'radio',
			// Array of 'key' => 'value' pairs for radio options.
			// Note: the 'key' is stored in meta field, not the 'value'
			'options'	=> array(
				'no-repeat'			=> 'None',
				'repeat-x'			=> 'Repeat-X',
				'repeat-y'			=> 'Repeat-Y',
				'repeat'			=> 'Repeat-Both',
			),
			'std'		=> 'repeat',
        ),	
        array(
            "name"      => "Background color",
            'id'		=> "{$prefix}section_background_color",
            "desc"    	=> "Pick a color",
            'type'		=> 'color',			
			'std'		=> '#FFFFFF',
        ),        	
        array(
            "name"      => "Text color",
            'id'		=> "{$prefix}section_text_color",
            "desc"    	=> "Pick a text variant (light or dark)",
            'type'		=> 'radio',		
            'options'	=> array(
				'light'			=> 'light',
				'dark'			=> 'dark',
			),	
			'std'		=> 'light',
        ),  
	)
);

//Page Settings - Is shown as separate page, Page Title

$meta_boxes[] = array(

	'id'		=> 'separate_page',
	'title'		=> 'Page settings',
	'pages'		=> array( 'page'),
	'fields'	=> array(	
            array(
                "name"      => "Show as home page section? <br/> <em></em>",
                'id'		=> "{$prefix}showOnHome",
                "desc"    	=> "Yes - Shown on home page as a section at specified order <br/> No - Shown as a separare page",
                'type'		=> 'radio',
				// Array of 'key' => 'value' pairs for radio options.
				// Note: the 'key' is stored in meta field, not the 'value'
				'options'	=> array(
					'y'			=> 'Yes',
					'n'			=> 'No'
				),
				'std'		=> 'n',
            ),
            array(
                "name"      => "Show Title? <br/> <em></em>",
                'id'		=> "{$prefix}showTitle",
                "desc"    	=> "Yes - Display section title on home page. <br/> No - Hide section title on home page.",
                'type'		=> 'radio',
				// Array of 'key' => 'value' pairs for radio options.
				// Note: the 'key' is stored in meta field, not the 'value'
				'options'	=> array(
					'yes'			=> 'Yes',
					'no'			=> 'No'
				),
				'std'		=> 'yes',
            ),            
            // ICON IMAGE UPLOAD
			array(
				'name'	=> 'Title Icon',
				'desc'	=> 'Title icon to shown on home page.',
				'id'	=> "{$prefix}pageIcon",
				'type'	=> 'plupload_image',
				'max_file_uploads' => 1,
			),
            array(
                "name"      => "Home page section style",
                'id'		=> "{$prefix}homeSectionStyle",
                "desc"    	=> "",
                'type'		=> 'radio',
				// Array of 'key' => 'value' pairs for radio options.
				// Note: the 'key' is stored in meta field, not the 'value'
				'options'	=> array(
					'portfolio'	=> 'Portfolio',
					'blog'		=> 'Blog',
					'none'		=> 'None',
				),
				'std'		=> 'none',
            ),
            array(
                "name"      => "Number of items to show on home page",
                'id'		=> "{$prefix}numberOfItems",
                "desc"    	=> "Default is 4 for Blog and 9 for Portfolio",
                'type'		=> 'text',
            ),
			array(
				'name'	=>	'Portfolio Category',
				'id'	=>	"{$prefix}portfolioCategory",
				'desc'	=>	'Select the category from which portfolio items are shown',
				'type'	=>	'select',
				'options'	=> $all_portfolio_terms,
				'std'	=> '',
			),
			array(
				'name'	=>	'Blog Posts Category',
				'id'	=>	"{$prefix}blogCategory",
				'desc'	=>	'Select the category from which blog posts are shown',
				'type'	=>	'select',
				'options'	=> $all_blog_terms,
				'std'	=> '',
			),                       
    )
);



//Video MetaBox - for both 'post' and 'portfolio'

$meta_boxes[] = array(
	'id'	=>	'video',
	'title'	=>	'Video',
	'pages'	=>	array('post', 'portfolio'),
	'fields'	=>	array(
		//Embed video
		array(
			'name'	=>	'Video link',
			'id'	=>	"{$prefix}video_link",
			'desc'	=>	'Paste the video link here. YouTube and Vimeo are supported.',
			'type'	=>	'text',			
		),
		//Embed video
		array(
			'name'	=>	'Embed Video',
			'id'	=>	"{$prefix}video",
			'desc'	=>	'Paste the video embed html here. The complete <em>iframe</em>. YouTube and Vimeo are supported.',
			'type'	=>	'textarea',			
			'cols'	=> "40",
			'rows'	=>	"4",
		),
	)
);



//Quote MetaBox - only for 'post' type

$meta_boxes[] = array(

	'id'	=>	'quote',

	'title'	=>	'Quote Settings',

	'pages'	=>	array('post'),



	'fields'	=>	array(		

		array(

			'name'	=>	'The Quote',

			'id'	=>	"{$prefix}quote",

			'desc'	=>	'Write your quote in this field.',

			'type'	=>	'textarea',

			'cols'	=> "40",

			'rows'	=>	"4",

		),

	)



);



//Additional Details - Client, Links, Testimonials - for 'portfolio' item

$meta_boxes[] = array(

	'id' =>	'additional',

	'title'	=>	'Additional Item Details',

	'pages'	=>	array('portfolio'),



	'fields'	=> array(

		//CLIENT

		array(

			// Field name - Will be used as label

			'name'		=> 'Client',

			// Field ID, i.e. the meta key

			'id'		=> $prefix . 'clientname',

			// Field description (optional)

			'desc'		=> 'Enter Client name',

			'type'		=> 'text',

		),

		//EXCERPT

		array(

			// Field name - Will be used as label

			'name'		=> 'Excerpt',

			// Field ID, i.e. the meta key

			'id'		=> $prefix . 'excerpt',

			// Field description (optional)

			'desc'		=> 'Enter portfolio excerpt.',

			'type'		=> 'textarea',

		),		

		//LINKS

		array(

			// Field name - Will be used as label

			'name'		=> 'Project Link',

			// Field ID, i.e. the meta key

			'id'		=> $prefix . 'link',						

			'clone'		=> false,

			'type'		=> 'text',

			'rows'		=>	"2",

			'desc'		=> 'If you would like a project link, please enter the url',

		),

		array(

			// Field name - Will be used as label

			'name'		=> 'Project Link Text',

			// Field ID, i.e. the meta key

			'id'		=> $prefix . 'link_text',						

			'clone'		=> false,

			'type'		=> 'text',

			'rows'		=>	"2",

			'desc'		=> 'Enter the text for the project link',

		),		

	)

);





/********************* META BOX REGISTERING ***********************/



/**

 * Register meta boxes

 *

 * @return void

 */

function tmg_register_meta_boxes()

{

	global $meta_boxes;



	// Make sure there's no errors when the plugin is deactivated or during upgrade

	if ( class_exists( 'RW_Meta_Box' ) )

	{

		foreach ( $meta_boxes as $meta_box )

		{

			new RW_Meta_Box( $meta_box );

		}

	}

}

// Hook to 'admin_init' to make sure the meta box class is loaded before

// (in case using the meta box class in another plugin)

// This is also helpful for some conditionals like checking page template, categories, etc.

add_action( 'admin_init', 'tmg_register_meta_boxes' );