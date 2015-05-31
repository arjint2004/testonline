<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['payments'] = Subscription::find('all', array('order'=>'id DESC'));
		$this->template->title('Administrator Panel : Payment History')
        ->set_layout($this->admin_tpl)
        ->set('page_title', 'Payment History')
        ->build($this->admin_folder.'/payments/list', $data);
	}
}