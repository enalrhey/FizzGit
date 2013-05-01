<?php
/** بسم الله الرحمن الرحيم **
 *
 * Plugin Name: Aqua Page Builder
 * Plugin URI: http://aquagraphite.com/page-builder
 * Description: Easily create custom page templates with intuitive drag-and-drop interface. Requires PHP5 and WP3.5
 * Version: 1.0.7b
 * Author: Syamil MJ
 * Author URI: http://aquagraphite.com
 * License: GPLV3
 *
 * @package   Aqua Page Builder
 * @author    Syamil MJ <http://aquagraphite.com>
 * @copyright Copyright (c) 2012, Syamil MJ
 * @license   http://www.gnu.org/copyleft/gpl.html
 *
 * @todo      - Preview template
 			  - Inactive blocks (for staging)
 			  - Template tabs sorting
 			  - Duplicate block
 */

//definitions
if(!defined('AQPB_VERSION')) define( 'AQPB_VERSION', '1.0.7b' );
if(!defined('AQPB_PATH')) 
	define( 'AQPB_PATH', get_template_directory().'/admin/aqua-page-builder/' );
if(!defined('AQPB_DIR')) 
	define( 'AQPB_DIR', get_template_directory_uri().'/admin/aqua-page-builder/' );

//required functions & classes
require_once(AQPB_PATH . 'functions/aqpb_config.php');
require_once(AQPB_PATH . 'functions/aqpb_blocks.php');
require_once(AQPB_PATH . 'classes/class-aq-page-builder.php');
require_once(AQPB_PATH . 'classes/class-aq-block.php');
require_once(AQPB_PATH . 'classes/class-aq-plugin-updater.php');
require_once(AQPB_PATH . 'functions/aqpb_functions.php');

//some default blocks
require_once(AQPB_PATH . 'blocks/aq-text-block.php');
require_once(AQPB_PATH . 'blocks/aq-column-block.php');
require_once(AQPB_PATH . 'blocks/aq-clear-block.php');
require_once(AQPB_PATH . 'blocks/aq-slider-block.php');
require_once(AQPB_PATH . 'blocks/aq-tile-block.php');

//register default blocks
aq_register_block('AQ_Text_Block');
aq_register_block('AQ_Column_Block');
aq_register_block('AQ_Clear_Block');
aq_register_block('AQ_Slider_Block');
aq_register_block('AQ_Tile_Block');

//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder =& new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();

//set up & fire up plugin updater
$aqpb_updater_config = array(
	'api_url'	=> 'http://aquagraphite.com/api/',
	'slug'		=> 'aqua-page-builder',
	'filename'	=> 'aq-page-builder.php'
);
$aqpb_updater = new AQ_Plugin_Updater($aqpb_updater_config);
