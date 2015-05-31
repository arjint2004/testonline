<?php 

class Frontend_Controller extends MY_Controller {
	protected $user_folder  = 'frontend';
	protected $styles  		= 'frontend/partials/css';
	protected $header 		= 'frontend/partials/header';
	protected $sidebar 		= 'frontend/partials/sidebar';
	protected $footer 		= 'frontend/partials/footer';
	protected $front_tpl 	= 'front_tpl';
	protected $modal_tpl 	= 'modal_tpl';

	function __construct() {
		parent::__construct();
		$this->template->set_partial('styles', $this->styles)
        ->set_partial('header', $this->header)
        ->set_partial('sidebar', $this->sidebar)
        ->set_partial('footer', $this->footer);
	}
}