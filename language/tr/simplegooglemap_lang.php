<?php

$lang['module_simplegooglemap_module_name'] = "Basit Google Harita Modülü";
$lang['module_simplegooglemap_module_usage'] = "Modül Kullanımı Hakkında Bilgi";

$lang['module_simplegooglemap_root'] = "Ana Dizin";
$lang['module_simplegooglemap_edit_map'] = "Haritayı Düzenle";

$lang['module_simplegooglemap_drag_and_drop_marker'] = 'Markerı sürükleyip bırakabilirsiniz';
$lang['module_simplegooglemap_default_marker_position'] = 'Varsayılan Marker Pozisyonu';
$lang['module_simplegooglemap_zoom_level'] = 'Yakınlaştırma Seviyesi';
$lang['module_simplegooglemap_map_type'] = 'Harita Tipi';
	$lang['module_simplegooglemap_map_type_satellite'] = 'Uydu';
	$lang['module_simplegooglemap_map_type_terrain'] = 'Arazi';
	$lang['module_simplegooglemap_map_type_roadmap'] = 'Yol Haritası';
	$lang['module_simplegooglemap_map_type_hybrid'] = 'Karışık';
$lang['module_simplegooglemap_map_type_control'] = 'Harita Tipi Kontrolü';
$lang['module_simplegooglemap_pan_control'] = 'Pan Kontrolü';
$lang['module_simplegooglemap_zoom_control'] = 'Yakınlaştırma Kontrolü';
$lang['module_simplegooglemap_scale_control'] = 'Ölçekleme Kontrolü';
$lang['module_simplegooglemap_scale_control'] = 'Ölçekleme Kontrolü';
$lang['module_simplegooglemap_street_view_control'] = 'Sokak Görünümü Kontrolü';
$lang['module_simplegooglemap_overview_map_control'] = 'Genel Harita Kontrolü';

$lang['module_simplegooglemap_save_map_settings'] = 'Harita Ayarlarını Kaydet';
$lang['module_simplegooglemap_settings_saved'] = 'Harita ayarları başarıyla kayıt edildi!';
$lang['module_simplegooglemap_settings_nsaved'] = 'Harita ayarları kaydetme başarısız!';

$lang['module_simplegooglemap_map_view'] = 'Harita Önizleme';


$lang['module_simplegooglemap_option_on'] = 'AÇIK';
$lang['module_simplegooglemap_option_off'] = 'KAPALI';


$lang['module_simplegooglemap_example_marker_title'] = 'Marker Başlığımız!!!';
$lang['module_simplegooglemap_example_marker_description'] = 'Marker açıklamamız!!!';

$lang['module_simplegooglemap_doc_content'] = "
	<h4>1. Birden fazla Google Haritası oluşturmak için <b>config.php</b> dosyasını ayarlama :</h4>
	<p>Google Harita Modülü kullanımı hakkında örnek kodları <b>/modules/Simplegooglemap/config/config.php</b> dosyasında görebilirsiniz.<p>
	<pre>
		// Harita oluşturabilmek için 2 tane array'a ihtiyacımız var
		
		// 1. Array Harita yapılandırması için
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
		
		// 2. Array Marker bilgileri için
		\$config['module_simplegooglemap_YOURMAPNAME_marker_info'] = array(
			'position' => '36.85607682455626, 28.236267770918175', // Marker coordinates if you don't know coordinates you can use <b>Edit Map</b> section by dragging marker you will see coordinates changing inside <b>Default Marker Position Input</b>
			'icon' => base_url() . 'modules/Simplegooglemap/assets/images/icon_48_module.png', // Dosya yolunun doğru olduğundan emin olun!
			'info_window_title' => 'module_simplegooglemap_example_marker_title', // Using language file for multilang title, you can create a translation in your theme file
			'info_window_description' => 'module_simplegooglemap_example_marker_description' // Using language file for multilang description, you can create a translation in your theme file
		);
	</pre>	
	<h4>2. Modülün ön sayfada kullanımı :</h4>
	<pre>
		&lt;!-- Eğer <b>config.php</b> dosyasından bir harita oluşturmak istiyorsak name=\"HARITA-ADINIZ\" şeklinde kullanmamız gerekiyor --&gt;
		&lt;ion:simplegooglemap width=\"100%\" height=\"300px\" name=\"contact\"&gt;
			&lt;ion:show_map /&gt;
		&lt;/ion:simplegooglemap&gt;
		
		&lt;!-- Varsayılan haritayı görüntülemek istiyorsak kod aşağıdaki gibi olmalıdır --&gt;
		&lt;ion:simplegooglemap width=\"100%\" height=\"300px\"&gt;
			&lt;ion:show_map /&gt;
		&lt;/ion:simplegooglemap&gt;
	</pre>
	
	<h4>3. Marker bilgi penceresine çıktısı aşağıdaki gibidir :</h4>
	<pre>
		&lt;div class=\"map_info_window\"&gt;
			&lt;h2&gt;Marker Başlığı&lt;/h2&gt;
			&lt;p&gt;Marker Açıklama Alanı&lt;/p&gt;
		&lt;/div&gt;
	</pre>
";
