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
        // Controller URL & Controller Fodler
        $this->controller_url = config_item('module_simplegooglemap_url') . 'simplegooglemap/';
        $this->controller_folder = 'admin/simplegooglemap/';

        // Load Model File For Module
        $this->load->model('Simplegooglemap_model', 'model_simplegooglemap');

        $this->table = 'module_simplegooglemap_settings';
        $this->pk_name = 'id_setting';

        // Send Controller URL to Templates
        $this->template['controller_url'] = $this->controller_url;
	}

    /**
     *
     */
    function index()
	{
        $this->template['settings'] = $this->model_simplegooglemap->get_settings();

		$this->output($this->controller_folder . 'index');
	}

    /**
     *
     */
    function view_map(){

		$this->template['map'] = $this->model_simplegooglemap->get_map();
		
		$this->output($this->controller_folder . 'view');
	}

    /**
     *
     */
    function edit_map(){
		
		$this->model_simplegooglemap->_check_lang_data_and_save();
		
		$this->template['lang_data'] = $this->model_simplegooglemap->get_lang_data();
		
		$this->template['settings'] = $this->model_simplegooglemap->get_settings();
		
		$this->output($this->controller_folder . 'edit');
	}

    /**
     *
     */
    function saveSettings(){
    	if($this->input->post('mapType') != '' && $this->input->post('mapTypeControl') != '' && $this->input->post('markerPosition') != ''
    		&& $this->input->post('overviewMapControl') != '' && $this->input->post('panControl') != '' && $this->input->post('scaleControl') != ''
    		&& $this->input->post('streetViewControl') != '' && $this->input->post('zoomControl') != '' && $this->input->post('zoomLevel') != ''
            && $this->input->post('height') != '' && $this->input->post('width') != '')
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
				'zoom_level' => $this->input->post('zoomLevel'),
                'height' => $this->input->post('height'),
                'width' => $this->input->post('width')
			);
			
			if($this->model_simplegooglemap->saveModuleSettings($data)){
					
				foreach(Settings::get_languages() as $l){			
					$title = array(
						'name' => 'title',
						'content' => $this->input->post('title_' . $l['lang']),
						'lang' => $l['lang']
					);
					$this->model_simplegooglemap->_check_lang_data_and_save($title);
					
					$description = array(
						'name' => 'description',
						'content' => $this->input->post('description_' . $l['lang']),
						'lang' => $l['lang']
					);
					$this->model_simplegooglemap->_check_lang_data_and_save($description);
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