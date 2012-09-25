<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Simplegooglemap Module tags
*/
class Simplegooglemap_Tags extends TagManager 
{
    public static $ci	=	NULL;

    /**
     * Tag declaration
     * These declaration will overwrite the autoload of tags
     *
     * @var array
     *
     * @usage	"<scope>" => "<method_in_this_class>"
     * 			Examples :
     * 			"articles:hello" => "my_hello_method"
     * 			"demo:authors" => "my_authors_method"
     */
    public static $tag_definitions = array
    (
        "simplegooglemap:show_map"				=>	"tag_show_map"
    );

	
	/**
     * @usage	<ion:simplegooglemap>
     *              ...
     * 		</ion:simplegooglemap>
     */
    public static function index(FTL_Binding $tag) {

        self::$ci = &get_instance();

        self::load_model('Simplegooglemap_model', 'model_simplegooglemap');

        $map = self::$ci->model_simplegooglemap->get_map($tag->getAttribute('name', ''), $tag->getAttribute('width', ''), $tag->getAttribute('height', ''));
		
		$tag->locals->simplegooglemap = $map;
		
        return $tag->expand();
    }
	
	public static function tag_show_map($tag) {
		return (!empty($tag->locals->simplegooglemap)) ? self::wrap($tag, $tag->locals->simplegooglemap['js'] . $tag->locals->simplegooglemap['html']) : '';
	}	
}
/* End of file tags.php */
/* Location: /modules/Simplegooglemap/libraries/tags.php */