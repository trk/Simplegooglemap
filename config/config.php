<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//***************************** MODULE SETTINGS START (Don't Modify This Section!) ----------------------------------------------------------//

// Module Settings
$config['module_simplegooglemap_name'] = 'Simple Google Map Module';

// Module Folder
$config['module_simplegooglemap_folder'] = 'Simplegooglemap';

// Module Folder Lowercase
$config['module_simplegooglemap_folder_lowercase'] = strtolower($config['module_simplegooglemap_folder']);

// Module URL
$config['module_simplegooglemap_url'] = admin_url() . 'module/' . $config['module_simplegooglemap_folder_lowercase'] . '/';

// Module Assets Folder
$config['module_simplegooglemap_assets_folder'] = base_url(). 'modules/' . $config['module_simplegooglemap_folder'] . '/assets/';

// Module View Folder
$config['module_simplegooglemap_views_folder'] = base_url(). 'modules/' . $config['module_simplegooglemap_folder'] . '/views/';

//***************************** MODULE SETTINGS END (Don't Modify This Section!) ----------------------------------------------------------//



//***************************** MAP SETTINGS START ----------------------------------------------------------//

/**
 * <ion:theme_url /> defined. just type your google map logo path in your theme folder!
 *
 * example :
 *      Your Logo Path is => http://www.yoursitename.com/themes/your_theme/assets/images/googlemap_logo.png
 *      For this example just type : assets/images/googlemap_logo.png
 *
 */

$img_path = 'assets/images/googlemap_logo.png';

$config['module_simplegooglemap_contact'] = array(
	'zoom' => 16,
	'map_type' => 'HYBRID', // SATELLITE, TERRAIN, ROADMAP, HYBRID
	'disableNavigationControl' => FALSE, //TRUE, FALSE
	'disablePanControl' => TRUE, // TRUE, FALSE
	'disableScaleControl' => TRUE, // TRUE, FALSE
	'disableMapTypeControl' => TRUE, // TRUE, FALSE
	'disableStreetViewControl' => TRUE, // TRUE, FALSE
	'disableOverviewMapControl' => TRUE, // TRUE, FALSE
);

$config['module_simplegooglemap_contact_marker_info'] = array(
	'position' => '36.85637728571459, 28.236321415098473',
	'icon' => $img_path
	//'info_window_title' => 'module_simplegooglemap_example_marker_title',
	//'info_window_description' => 'module_simplegooglemap_example_marker_description'
);

//***************************** MAP SETTINGS END ----------------------------------------------------------//
