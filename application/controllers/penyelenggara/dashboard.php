<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['exams'] 			= Exam::count();
		$data['subscriptions'] 	= Subscription::count();
		$data['users'] 			= User::count();
		$data['questions'] 		= Question::count();
		$data['recent_subscriptions'] 	= Subscription::all(array('order'=>'id desc', 'limit' => 5));
		$data['payments'] 	= Subscription::all(array('order'=>'id desc', 'limit' => 5));

		$this->template->title('Administrator Panel')
        ->set_layout($this->admin_tpl)
        ->set('page_title', 'Dashboard')
        ->build($this->admin_folder.'/dashboard', $data);
	}

	
}
