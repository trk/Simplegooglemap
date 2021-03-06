<?php

$lang['module_simplegooglemap_module_name'] = "Simple Google Map Module";
$lang['module_simplegooglemap_module_usage'] = "Info About Module Usage";

$lang['module_simplegooglemap_root'] = "Root";
$lang['module_simplegooglemap_edit_map'] = "Edit Map";

$lang['module_simplegooglemap_drag_and_drop_marker'] = 'You can drag and drop marker';
$lang['module_simplegooglemap_default_marker_position'] = 'Default Marker Position';
$lang['module_simplegooglemap_width'] = 'Width';
$lang['module_simplegooglemap_height'] = 'Height';
$lang['module_simplegooglemap_zoom_level'] = 'Zoom Level';
$lang['module_simplegooglemap_map_type'] = 'Map Type';
	$lang['module_simplegooglemap_map_type_satellite'] = 'Satellite';
	$lang['module_simplegooglemap_map_type_terrain'] = 'Terrain';
	$lang['module_simplegooglemap_map_type_roadmap'] = 'Roadmap';
	$lang['module_simplegooglemap_map_type_hybrid'] = 'Hybrid';
$lang['module_simplegooglemap_map_type_control'] = 'Map Type Control';
$lang['module_simplegooglemap_pan_control'] = 'Pan Control';
$lang['module_simplegooglemap_zoom_control'] = 'Zoom Control';
$lang['module_simplegooglemap_scale_control'] = 'Scale Control';
$lang['module_simplegooglemap_street_view_control'] = 'Street View Control';
$lang['module_simplegooglemap_overview_map_control'] = 'Overview Map Control';

$lang['module_simplegooglemap_save_map_settings'] = 'Save Map Settings';
$lang['module_simplegooglemap_settings_saved'] = 'Map settings successfully saved!';
$lang['module_simplegooglemap_settings_nsaved'] = 'Map settings could not save!';

$lang['module_simplegooglemap_map_view'] = 'Map Preview';


$lang['module_simplegooglemap_option_on'] = 'ON';
$lang['module_simplegooglemap_option_off'] = 'OFF';


// For Example Usage
$lang['module_simplegooglemap_example_marker_title'] = 'Our Marker Title!!!';
$lang['module_simplegooglemap_example_marker_description'] = 'Our Marker Description!!!';

$lang['module_simplegooglemap_doc_content'] = "
	<h4>1. For create many google map you can setup the config.php :</h4>
	<p>You can create custom maps by using <b>/modules/Simplegooglemap/config/config.php</b> file. You will see an example usage<p>
	<pre>
		// We need 2 array for create Google Map
		
		// 1. Array For Map Configuration
		\$config['module_simplegooglemap_YOURMAPNAME'] = array(
			'zoom' => 17,
			'map_type' => 'SATELLITE', // SATELLITE, TERRAIN, ROADMAP, HYBRID
			'disableNavigationControl' => FALSE, //TRUE, FALSE
			'disablePanControl' => TRUE, // TRUE, FALSE
			'disableScaleControl' => TRUE, // TRUE, FALSE
			'disableMapTypeControl' => TRUE, // TRUE, FALSE
			'disableStreetViewControl' => TRUE, // TRUE, FALSE
			'disableOverviewMapControl' => TRUE, // TRUE, FALSE
		);
		
		// 2. Array For Marker Informations
		\$config['module_simplegooglemap_YOURMAPNAME_marker_info'] = array(
			'position' => '36.85607682455626, 28.236267770918175', // Marker coordinates if you don't know coordinates you can use <b>Edit Map</b> section by dragging marker you will see coordinates changing inside <b>Default Marker Position Input</b>
			'icon' => base_url() . 'modules/Simplegooglemap/assets/images/icon_48_module.png', // Be sure your file path true!
			'info_window_title' => 'module_simplegooglemap_example_marker_title', // Using language file for multilang title, you can create a translation in your theme file
			'info_window_description' => 'module_simplegooglemap_example_marker_description' // Using language file for multilang description, you can create a translation in your theme file
		);
	</pre>
		<h4>2. Module usage at Front Page of website :</h4>
	<pre>
		&lt;!-- If want to use <b>config.php</b> file for create map need to use <b>name=\"YOUR-MAP-NAME\"</b> attribute : --&gt;
		&lt;ion:simplegooglemap width=\"100%\" height=\"300px\" name=\"contact\"&gt;
			&lt;ion:show_map /&gt;
		&lt;/ion:simplegooglemap&gt;
		
		&lt;!-- If you want to display default map : --&gt;
		&lt;ion:simplegooglemap width=\"100%\" height=\"300px\"&gt;
			&lt;ion:show_map /&gt;
		&lt;/ion:simplegooglemap&gt;
	</pre>
	
	<h4>3. Marker info window output like :</h4>
	<pre>
		&lt;div class=\"map_info_window\"&gt;
			&lt;h2&gt;Marker Title&lt;/h2&gt;
			&lt;p&gt;Your maarker description&lt;/p&gt;
		&lt;/div&gt;
	</pre>
";