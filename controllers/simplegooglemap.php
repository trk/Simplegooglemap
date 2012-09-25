<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simplegooglemap extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	function index()
	{
        echo theme_url();
		print "Simple Google Map Module";
	}
}
