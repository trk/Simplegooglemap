<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Simplegooglemap Module tags
*/
class Simplegooglemap_Tags extends TagManager 
{
	private static function load_model($model_name, $new_name='') {
        $ci = &get_instance();

        if (!isset($ci->{$new_name}))
            $ci->load->model($model_name, $new_name, true);
    }
	
	/**
     * @usage	<ion:simplegooglemap>
     *              ...
     * 		</ion:simplegooglemap>
     */
    public static function index(FTL_Binding $tag) {
        $ci = &get_instance();
		
		$name = (isset($tag->attr['name']) ) ? $tag->attr['name'] : '';
		$width = (isset($tag->attr['width']) ) ? $tag->attr['width'] : '';
		$height = (isset($tag->attr['height']) ) ? $tag->attr['height'] : '';
		
		self::load_model('Simplegooglemap_settings_model', 'simplegooglemap_model');

        $map = $ci->simplegooglemap_model->get_map($name, $width, $height);
		
		$tag->locals->simplegooglemap = $map;
		
        return $tag->expand();
    }
	
	public static function show_map($tag) { return (!empty($tag->locals->simplegooglemap)) ? self::wrap($tag, $tag->locals->simplegooglemap['js'] . $tag->locals->simplegooglemap['html']) : ''; }	
}
/* End of file tags.php */
/* Location: /modules/Simplegooglemap/libraries/tags.php */