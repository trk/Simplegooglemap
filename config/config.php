<?php 

$img_path = 'themes/default/assets/img/logo_google_map.png'; // IMG PATH

$config['module_simplegooglemap_name'] = "Simple Google Map Module";

$config['module_simplegooglemap_contact'] = array(
	'zoom' => 14,
	'map_type' => 'HYBRID', // SATELLITE, TERRAIN, ROADMAP, HYBRID
	'disableNavigationControl' => FALSE, //TRUE, FALSE
	'disablePanControl' => TRUE, // TRUE, FALSE
	'disableScaleControl' => TRUE, // TRUE, FALSE
	'disableMapTypeControl' => TRUE, // TRUE, FALSE
	'disableStreetViewControl' => TRUE, // TRUE, FALSE
	'disableOverviewMapControl' => TRUE, // TRUE, FALSE
);

$config['module_simplegooglemap_contact_marker_info'] = array(
	'position' => '36.85636870112647, 28.236310686262414', // My office coords :)
	'icon' => base_url() . $img_path, // Also you can use image file
	//'info_window_title' => 'module_simplegooglemap_example_marker_title', // You can use lang item
	//'info_window_description' => 'module_simplegooglemap_example_marker_description' // You can use lang item
);
