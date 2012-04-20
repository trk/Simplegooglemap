<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * IonizeCMS Module Model
 *
 * @file : Simplegooglemap_settings_model.php
 * @author : Iskender TOTOGLU
 * @link : http://www.6ve1.com
 *
 */
class Simplegooglemap_settings_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
        
        $this->table =		'module_simplegooglemap_settings';
        $this->pk_name 	=	'id_setting';
    }
	
	function get_map($name = FALSE, $width = FALSE, $height = FALSE) {
			
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
				$marker['icon'] = $marker_data['icon'];
			}
			$marker['position'] = $marker_data['position'];
			
			if(!empty($marker_data['info_window_title']) && !empty($marker_data['info_window_description'])){
				$marker['infowindow_content'] = "<div class='map_info_window'><h2>" . lang($marker_data['info_window_title']) . "</h2><p>" . lang($marker_data['info_window_description']) . "</p></div>";
			}

			$this->googlemaps->add_marker($marker);
			
			$this->googlemaps->initialize($map_config);
			
			return $this->googlemaps->create_map();
		} else {
			
			$settings  =   self::moduleSettings();
						
			$map_config = array(
				'minifyJS' => TRUE,
				'map_height' => $height,
				'map_width' => $width,
				'center' => $settings['default_marker_position'],
				'zoom' => $settings['zoom_level'],
				'map_type' => $settings['map_type'],
				'disableNavigationControl' => $settings['zoom_control'],
				'disablePanControl' => $settings['pan_control'],
				'disableScaleControl' => $settings['scale_control'],
				'disableMapTypeControl' => $settings['map_type_control'],
				'disableStreetViewControl' => $settings['street_view_control'],
				'disableOverviewMapControl' => $settings['overview_map_control']
			);
			
			$marker = array();
			$marker['position'] = $settings['default_marker_position'];
			$marker['infowindow_content'] = self::get_info_window();
			
			$this->googlemaps->add_marker($marker);
			
			$this->googlemaps->initialize($map_config);
			
			return $this->googlemaps->create_map();
		}
	}
	
    function moduleSettings() {
        $setting_items = $this->db->get($this->table);

        if(count($setting_items->result_array()) > 0) {
            $setting = array();
            foreach($setting_items->result_array() as $setting_item) {
                $setting[$setting_item['name']] = $setting_item['content'];
            }

            return $setting;
        } else {
            return;
        }
    }
	
	function saveModuleSettings($data) {
		foreach ($data as $name => $value) {
			$this->db->where('name', $name);
			$this->db->update($this->table, array('content' => $value));
		}
		
		return TRUE;
	}
	
	function get_info_window(){
		
		$qryTitle = $this->db->get_where($this->table, array('name' => 'title', 'lang' => Settings::get_lang()));
		$qryTitleArray = $qryTitle->row_array();
		
		$qryDesc = $this->db->get_where($this->table, array('name' => 'description', 'lang' => Settings::get_lang()));
		$qryDescArray = $qryDesc->row_array();
		
		if(!empty($qryTitleArray['content']) && !empty($qryDescArray['content'])){
			return "<div class='map_info_window'><h2>" . $qryTitleArray['content'] . "</h2><p>" . $qryDescArray['content'] . "</p></div>";
		}
		
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
	
	function simplemap_module_installer(){
		$qry = $this->db->get($this->table);
		
		if(count($qry->result_array()) < 1){
			$data = array(
				array(
					'name' => 'map_type',
					'content' => 'SATELLITE'
				),
				array(
					'name' => 'map_type_control',
					'content' => 'false'
				),
				array(
					'name' => 'pan_control',
					'content' => 'false'
				),
				array(
					'name' => 'zoom_control',
					'content' => 'false'
				),
				array(
					'name' => 'scale_control',
					'content' => 'false'
				),
				array(
					'name' => 'street_view_control',
					'content' => 'false'
				),
				array(
					'name' => 'overview_map_control',
					'content' => 'false'
				),
				array(
					'name' => 'default_marker_position',
					'content' => '36.86000848002827, 28.270664419325158'
				),
				array(
					'name' => 'zoom_level',
					'content' => '9' 
				)
			);
			
			$this->db->insert_batch($this->table, $data);
		}
		
		return;
	}
}
/* End of file Simplegooglemap_settings_model.php*/
/* Location: ./modules/Simplegooglemap/models/Simplegooglemap_settings_model.php */