<?php 

class Backend_Controller extends MY_Controller {

	protected $admin_folder = 'backend';
	protected $styles  		= 'backend/partials/css';
	protected $header 		= 'backend/partials/header';
	protected $sidebar 		= 'backend/partials/sidebar';
	protected $footer 		= 'backend/partials/footer';
	protected $admin_tpl 	= 'admin_tpl';
	protected $modal_tpl 	= 'modal_tpl';

	function __construct() {
		parent::__construct();
		$this->template->set_partial('styles', $this->styles)
        ->set_partial('header', $this->header)
        ->set_partial('sidebar', $this->sidebar)
        ->set_partial('footer', $this->footer);

        //login check 
		$exception_urls = array(
			'admin/auth',
		);
		//echo uri_string(); die();
		if (in_array(uri_string(), $exception_urls) == FALSE) {
			if(!$this->ion_auth->logged_in()){
				redirect('admin/auth/');
			}
			else if(!$this->ion_auth->is_admin() && !$this->ion_auth->is_admin($this->session->userdata('user_id'),'penyelenggara_group')) {
				redirect('');
			}
		}
		
        //login check 
		/*$exception_urls = array(
			'penyelenggara/auth',
		);
		
		if (in_array(uri_string(), $exception_urls) == FALSE) {
			if(!$this->ion_auth->logged_in()){
				redirect('penyelenggara/auth/');
			}
			else if(!$this->ion_auth->is_admin()) {
				redirect('');
			}
		}*/
	}

}