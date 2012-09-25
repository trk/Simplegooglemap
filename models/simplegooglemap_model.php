<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * IonizeCMS Module Model
 *
 * @file : Simplegooglemap_settings_model.php
 * @author : Iskender TOTOGLU
 * @link : http://www.6ve1.com
 *
 */
class Simplegooglemap_model extends Base_model
{

    protected  $_table = 'module_simplegooglemap_settings';
    protected  $_pk_name = 'id_setting';

    /**
     * Model Constructor
     *
     * @access	public
     */
    public function __construct()
    {
        parent::__construct();

        self::set_table($this->_table);
        self::set_pk_name($this->_pk_name);
    }


    function get_settings() {

        $settings = self::get_list();

        $result = array();

        foreach($settings as $key => $setting) {

            if($setting['name'] != 'title' || $setting['name'] != 'description')
                $result[$setting['name']] = $setting['content'];

            if(($setting['name'] == 'title' || $setting['name'] == 'description'))
                $result[$setting['name']] = array(
                    'content' => $setting['content'],
                    'lang' => $setting['lang']
                );

        }

        log_message('error', print_r($result, TRUE));

        return $result;
    }

	function get_map($name = FALSE, $width = FALSE, $height = FALSE) {

        $current_lang = Settings::get_lang();

		$this->load->library('googlemaps');
		
		$height = ($height != FALSE) ? $height : '100%';
		$width = ($width != FALSE) ? $width : '100%';
		
		if($name != FALSE && config_item('module_simplegooglemap_' . $name)){
			
			$map_config_data = config_item('module_simplegooglemap_' . $name);
			$marker_data = config_item('module_simplegooglemap_' . $name . '_marker_info');
				
			$map_config = array(
				'minifyJS' => TRUE,
				'map_height' => $height,
				'map_width' => $width,
				'center' => $marker_data['position'],
				'zoom' => $map_config_data['zoom'],
				'map_type' => $map_config_data['map_type'],
				'disableNavigationControl' => $map_config_data['disableNavigationControl'],
				'disablePanControl' => $map_config_data['disablePanControl'],
				'disableScaleControl' => $map_config_data['disableScaleControl'],
				'disableMapTypeControl' => $map_config_data['disableMapTypeControl'],
				'disableStreetViewControl' => $map_config_data['disableStreetViewControl'],
				'disableOverviewMapControl' => $map_config_data['disableOverviewMapControl']
			);
			
			$marker = array();
			
			if($marker_data['icon'] != ''){
				$marker['icon'] = theme_url() . $marker_data['icon'];
			}
			$marker['position'] = $marker_data['position'];
			
			if(!empty($marker_data['info_window_title']) && !empty($marker_data['info_window_description'])){
				$marker['infowindow_content'] = "<div class='map_info_window'><h2>" . lang($marker_data['info_window_title']) . "</h2><p>" . lang($marker_data['info_window_description']) . "</p></div>";
			}

			$this->googlemaps->add_marker($marker);
			
			$this->googlemaps->initialize($map_config);
			
			return $this->googlemaps->create_map();
		} else {
			
			$settings  =   self::get_settings();
						
			$map_config = array(
				'minifyJS' => TRUE,
				'map_height' => ($settings['height'] != '') ? $settings['height'] : $height,
				'map_width' => ($settings['width'] != '') ? $settings['width'] : $width,
				'center' => $settings['default_marker_position'],
				'zoom' => $settings['zoom_level'],
				'map_type' => $settings['map_type'],
				'disableNavigationControl' => ($settings['zoom_control'] == 'true') ? FALSE : TRUE,
				'disablePanControl' => ($settings['pan_control'] == 'true') ?  FALSE : TRUE,
				'disableScaleControl' => ($settings['scale_control'] == 'true') ?  FALSE : TRUE,
				'disableMapTypeControl' => ($settings['map_type_control'] == 'true') ?  FALSE : TRUE,
				'disableStreetViewControl' => ($settings['street_view_control'] == 'true') ? FALSE : TRUE,
				'disableOverviewMapControl' => ($settings['overview_map_control'] == 'true') ? FALSE : TRUE
			);
			
			$marker = array();

            // Set marker position
			$marker['position'] = $settings['default_marker_position'];

            // Prepare info Window
            if(! empty($settings['title']) && ! empty($settings['description']))
                $marker['infowindow_content'] = "<div class='map_info_window'><h2>" . $settings['title']['content'] . "</h2><p>" . $settings['description']['content'] . "</p></div>";

            // Adding Marker Position and Settings
			$this->googlemaps->add_marker($marker);

			$this->googlemaps->initialize($map_config);
			
			return $this->googlemaps->create_map();
		}
	}
	
	function saveModuleSettings($data) {
		foreach ($data as $name => $value) {
			$this->db->where('name', $name);
			$this->db->update($this->table, array('content' => $value));
		}
		
		return TRUE;
	}
	
	function _check_lang_data_and_save($lang_data = NULL){
		if($lang_data != NULL){
			$qry = $this->db->get_where($this->table, array('name' => $lang_data['name'], 'lang' => $lang_data['lang']));
			
			if($qry->num_rows() < 1) {			
				$this->db->insert($this->table, $lang_data);
			}
			else {
				$this->db->where(array('name' => $lang_data['name'], 'lang' => $lang_data['lang']));
				$this->db->update($this->table, array('content' => $lang_data['content']));
			}
		} else {
			// Create Empty Lang Data
			foreach(Settings::get_languages() as $l){
				
				$qry_title = $this->db->get_where($this->table, array('name' => 'title', 'lang' => $l['lang']));
				
				if($qry_title->num_rows() < 1) {
					$title = array(
							'name' => 'title',
							'content' => ' ',
							'lang' => $l['lang']
						);
					$this->db->insert($this->table, $title);
				}
				
				$qry_description = $this->db->get_where($this->table, array('name' => 'description', 'lang' => $l['lang']));
				
				if($qry_title->num_rows() < 1) {
					$description = array(
							'name' => 'description',
							'content' => ' ',
							'lang' => $l['lang']
						);
					$this->db->insert($this->table, $description);
				}
			}
		}
		return;
	}
	
	function get_lang_data(){

		$data = array();
		
		foreach(Settings::get_languages() as $l){
			$qry_title = $this->db->get_where($this->table, array('name' => 'title', 'lang' => $l['lang']));
			$qry_title_array = $qry_title->row_array();
			
			$qry_desc = $this->db->get_where($this->table, array('name' => 'description', 'lang' => $l['lang']));
			$qry_desc_array = $qry_desc->row_array();
			
			$data[$l['lang']] = array(
				'title' => $qry_title_array['content'],
				'description' => $qry_desc_array['content']
			);
		}
		
		return $data;
	}
}
/* End of file Simplegooglemap_model.php*/
/* Location: ./modules/Simplegooglemap/models/Simplegooglemap_model.php */