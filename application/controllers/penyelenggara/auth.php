<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Backend_Controller {
	protected $auth_folder 	= 'auth';
	protected $styles  		= 'auth/partials/css';
	protected $footer 		= 'auth/partials/footer';
	protected $auth_tpl		= 'auth_tpl';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('ion_auth');
	}

	public function index(){
		//validate form input
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//pr($this->session->userdata);
				if($this->ion_auth->is_admin()) {
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					//echo 'login admin';
					//die();
					//redirect('penyelenggara/dashboard');
				}elseif($this->ion_auth->is_admin($this->session->userdata('user_id'),'penyelenggara_group')) {
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					//echo 'login penyelenggara';
					//die();
					//redirect('penyelenggara/dashboard');
				}
				else{
					redirect('', 'refresh');
				}
				//redirect them back to the home page
				
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('error', $this->ion_auth->errors());
				//redirect('penyelenggara/auth'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->template->title('Online Exam System | Administrator Login ')
	        ->set_layout($this->auth_tpl)
	        ->set('page_title', 'Forgot Password')
	        ->build($this->auth_folder.'/login', $this->data);
		}
		//setup the input
	}

	public function logout(){

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('success', $this->ion_auth->messages());
		redirect('penyelenggara/auth', 'refresh');
	}



}