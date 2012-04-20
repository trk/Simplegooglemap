<?php 

$img_path = 'themes/default/assets/img/logo_google_map.png';

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
	'position' => '36.85405511948054, 28.276753033788964',
	'icon' => base_url() . $img_path,
	//'info_window_title' => 'module_simplegooglemap_example_marker_title',
	//'info_window_description' => 'module_simplegooglemap_example_marker_description'
);
