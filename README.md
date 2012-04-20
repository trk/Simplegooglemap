### 1. For create many google map you can setup the config.php :

	# You can create custom maps by using /modules/Simplegooglemap/config/config.php file. You will see an example usage
		// We need 2 array for create Google Map
		
		### 1. Array For Map Configuration
		$config['module_simplegooglemap_YOURMAPNAME'] = array(
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
		$config['module_simplegooglemap_YOURMAPNAME_marker_info'] = array(
			'position' => '36.85607682455626, 28.236267770918175', // Marker coordinates if you don't know coordinates you can use <b>Edit Map</b> section by dragging marker you will see coordinates changing inside <b>Default Marker Position Input</b>
			'icon' => base_url() . 'modules/Simplegooglemap/assets/images/icon_48_module.png', // Be sure your file path true!
			'info_window_title' => 'module_simplegooglemap_example_marker_title', // Using language file for multilang title, you can create a translation in your theme file
			'info_window_description' => 'module_simplegooglemap_example_marker_description' // Using language file for multilang description, you can create a translation in your theme file
		);
### 2. Module usage at Front Page of website :

		<!-- If want to use <b>config.php</b> file for create map need to use <b>name=\"YOUR-MAP-NAME\"</b> attribute : -->
		<ion:simplegooglemap width="100%" height="300px" name="contact">
			<ion:show_map />
		</ion:simplegooglemap>
		
		<!-- If you want to display default map : -->
		<ion:simplegooglemap width="100%" height="300px">
			<ion:show_map />
		</ion:simplegooglemap>
	
### 3. Marker info window output like :

		<div class="map_info_windo\">
			<h2>Marker Title</h2>
			<p>Your maarker description</p>
		</div>