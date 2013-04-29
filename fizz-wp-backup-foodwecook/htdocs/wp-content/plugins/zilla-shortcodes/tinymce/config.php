<?php

/*-----------------------------------------------------------------------------------*/
// Button
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'textdomain'),
			'desc' => __('Add the button\'s url eg http://example.com', 'textdomain')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Color', 'textdomain'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'textdomain'),
			'options' => array(
				'red' => 'Red',
				'blue' => 'Blue',
				'yellow' => 'Yellow',
				'lime' => 'Lime Green',
				'grey' => 'Grey'
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'textdomain'),
			'desc' => __('Select the button\'s type', 'textdomain'),
			'options' => array(
				'normal' => 'Normal',
				'striped' => 'Striped'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'textdomain'),
			'desc' => __('Select the button\'s size', 'textdomain'),
			'options' => array(
				'thin' => 'Thin',
				'normal' => 'Normal',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'textdomain'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'textdomain'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'textdomain'),
			'desc' => __('Add the button\'s text', 'textdomain'),
		)
	),
	'shortcode' => '[button link="{{url}}" color="{{style}}" size="{{size}}" type="{{type}}" target="{{target}}"] {{content}} [/button]',
	
	'popup_title' => __('Insert Button Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
// Quotes
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['blockquote'] = array(
	'no_preview' => true,
	'params' => array(
		'cite' => array(
			'std' => 'Name',
			'type' => 'text',
			'label' => __('Author', 'textdomain'),
			'desc' => __('The Author of the used quote', 'textdomain')
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Quote Align', 'textdomain'),
			'desc' => __('Align the quote left or right to the other content', 'textdomain'),
			'options' => array(
				'left' => 'left ',
				'right' => 'right'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Text font size', 'textdomain'),
			'desc' => __('Select the quote font size', 'textdomain'),
			'options' => array(
				'normal' => 'Normal',
				'small' => 'Small'
			)
		),
		'content' => array(
			'std' => 'Quote',
			'type' => 'text',
			'label' => __('Quote', 'textdomain'),
			'desc' => __('The quote\'s text', 'textdomain'),
		)
	),
	'shortcode' => '[blockquote cite="{{cite}}" align="{{align}}" size="{{size}}"] {{content}} [/blockquote]',
	
	'popup_title' => __('Insert Blockquote Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Slider Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['slider'] = array(
	'no_preview' => true,
	'params' => array(
		'height' => array(
			'type' => 'select',
			'label' => __('Slider Height ', 'textdomain'),
			'desc' => __('Enter Slider Height', 'textdomain'),
			'options' => array(
				'm' => 'Medium',
				'l' => 'Large',
				'xl' => 'Extra Large'
			)
		),
		'shownav' => array(
			'type' => 'select',
			'label' => __('Show Slide Navigation?', 'textdomain'),
			'desc' => __('Slide Navigation', 'textdomain'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)			
		)
	),
	'shortcode' => '[slider height="{{name}}" show_navigation="{{shownav}}"][/slider]',
	
	'popup_title' => __('Insert Slider Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Slide Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['slide'] = array(
	'no_preview' => true,
	'params' => array(
		/*'link' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Slide target link', 'textdomain'),
			'desc' => __('Enter the page URL to link the slide to', 'textdomain')
		),*/
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Slide title', 'textdomain'),
			'desc' => __('Enter the title to show on the slide', 'textdomain')
		),
		'desc' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Slide description', 'textdomain'),
			'desc' => __('Enter the description to show on the slide', 'textdomain')
		),
	),
	'shortcode' => '[slide title="{{title}}" desc="{{desc}}"][/slide]',
	
	'popup_title' => __('Insert Slide Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Tile Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tile'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '25px',
			'type' => 'text',
			'label' => __('Tile Title', 'textdomain'),
			'desc' => __('Enter tile title', 'textdomain')
		),
		'height' => array(
			'type' => 'select',
			'label' => __('Tile Height ', 'textdomain'),
			'desc' => __('Select Tile Height', 'textdomain'),
			'options' => array(
				'm' => 'Medium',
				'l' => 'Large',
				'xl' => 'Extra Large'
			)
		),
		'link' => array(
			'std' => '25px',
			'type' => 'text',
			'label' => __('Tile link', 'textdomain'),
			'desc' => __('Enter the URL to link to', 'textdomain')
		),	
		'internal' => array(
			'type' => 'select',
			'label' => __('Tile link location', 'textdomain'),
			'desc' => __('Is link with in the page?', 'textdomain'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
			)
		),
		'static' => array(
			'type' => 'select',
			'label' => __('Tile style ', 'textdomain'),
			'desc' => __('Select tile style', 'textdomain'),
			'options' => array(
				'yes' => 'Static',
				'no' => 'Not Static',
			)
		),					
	),
	'shortcode' => '[tile title="{{title}}" link="{{link}}" height="{{height}}" is_internal="{{internal}}" is_static="{{static}}"][/tile]',
	
	'popup_title' => __('Insert Tile Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Section Heading Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['sectionheading'] = array(
	'no_preview' => true,
	'params' => array(
		'class' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Custom class', 'textdomain'),
			'desc' => __('Enter class name here (optional)', 'textdomain')
		),
		'text_content' => array(
			'std' => 'Enter heading here',
			'type' => 'text',
			'label' => __('Heading text', 'textdomain'),
			'desc' => __('Enter heading text', 'textdomain')
		)
	),
	'shortcode' => '[sectionheading class="{{class}}"]{{text_content}}[/sectionheading]',
	
	'popup_title' => __('Insert Section Heading Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[tabgroup] {{child_shortcode}}  [/tabgroup]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'id' => array(
                'std' => 'id',
                'type' => 'text',
                'label' => __('Tab Id', 'textdomain'),
                'desc' => __('Unique Id of the tab (e.g. Tab1)', 'textdomain'),
            ),            
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[tab title="{{title}}" id="{{id}}"] {{content}} [/tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'one_half' => 'One Half',
					'one_half_last' => 'One Half Last',
					'one_third' => 'One Third',
					'one_third_last' => 'One Third Last',
					'two_thirds' => 'Two Thirds',
					'two_third_last' => 'Two Thirds Last',
					'one_fourth' => 'One Fourth',
					'one_fourth_last' => 'One Fourth Last',
					'three_fourths' => 'Three Fourth',
					'three_fourths_last' => 'Three Fourth Last',
					'one_sixth' => 'One Sixth',
					'one_sixth_last' => 'One Sixth Last',
					'five_sixth' => 'Five Sixth',
					'five_sixth_last' => 'Five Sixth Last',					
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' => __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'textdomain')
	)
);

?>