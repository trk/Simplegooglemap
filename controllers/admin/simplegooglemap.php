<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * IonizeCMS Module Controller
 *
 * @file : Simplegooglemap.php
 * @author : Iskender TOTOGLU
 * @link : http://www.6ve1.com
 *
 */
class Simplegooglemap extends Module_Admin 
{
	function construct()
	{
		$this->load->model('Simplegooglemap_settings_model', 'simplegooglemap_model', true);
		
		$this->table =		'module_simplegooglemap_settings';
        $this->pk_name 	=	'id_setting';
		$this->controller_url = admin_url() . 'module/simplegooglemap/';
	}

	function index()
	{
		$this->simplegooglemap_model->simplemap_module_installer();
		
		$this->output('admin/simplegooglemap');
	}
	
	function map_view(){
		
		$this->template['map'] = $this->simplegooglemap_model->get_map();
		
		$this->output('admin/map_view');
	}
	function edit_map(){
		
		$this->simplegooglemap_model->_check_lang_data_and_save();
		
		$this->template['lang_data'] = $this->simplegooglemap_model->get_lang_data();
		
		$this->template['controller_url'] = $this->controller_url;
		
		$this->template['settings'] = $this->simplegooglemap_model->moduleSettings();
		
		$this->output('admin/edit_map');
	}
	
	function saveSettings(){
    	if($this->input->post('mapType') != '' && $this->input->post('mapTypeControl') != '' && $this->input->post('markerPosition') != ''
    		&& $this->input->post('overviewMapControl') != '' && $this->input->post('panControl') != '' && $this->input->post('scaleControl') != ''
    		&& $this->input->post('streetViewControl') != '' && $this->input->post('zoomControl') != '' && $this->input->post('zoomLevel') != '')
		{
			$data = array(
				'map_type' => $this->input->post('mapType'),
				'map_type_control' => $this->input->post('mapTypeControl'),
				'default_marker_position' => $this->input->post('markerPosition'),
				'overview_map_control' => $this->input->post('overviewMapControl'),
				'pan_control' => $this->input->post('panControl'),
				'scale_control' => $this->input->post('scaleControl'),
				'street_view_control' => $this->input->post('streetViewControl'),
				'zoom_control' => $this->input->post('zoomControl'),
				'zoom_level' => $this->input->post('zoomLevel')
			);
			
			if($this->simplegooglemap_model->saveModuleSettings($data)){
					
				foreach(Settings::get_languages() as $l){			
					$title = array(
						'name' => 'title',
						'content' => $this->input->post('title_' . $l['lang']),
						'lang' => $l['lang']
					);
					$this->simplegooglemap_model->_check_lang_data_and_save($title);
					
					$description = array(
						'name' => 'description',
						'content' => $this->input->post('description_' . $l['lang']),
						'lang' => $l['lang']
					);
					$this->simplegooglemap_model->_check_lang_data_and_save($description);
				}
				
				echo json_encode('success');
			}
			else {
				echo json_encode('error');
			}
		}
		else{
			echo json_encode('error');
		}
    }
}
/* End of file Simplegooglemap.php*/
/* Location: ./modules/Simplegooglemap/controllers/admin/simplegooglemap.php */