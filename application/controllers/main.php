<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Frontend_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}                              
	public function index()
	{
		$data['exams'] = Exam::find('all', array('order'=>'id DESC',  'limit'=>4));
		$data['menu'] = 'main';
		$this->template->title('Home')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'Home')
        ->build($this->user_folder.'/home', $data);
	}

	public function about(){
		$data['menu'] = 'about';
		$settings =  Setting::first();
		$data['content'] = $settings->aboutus_content;
		$this->template->title('About')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'About')
        ->build($this->user_folder.'/about', $data);
	}

	public function contact(){
		$this->form_validation->set_rules('name', 'name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('subject', 'subject', 'required|xss_clean');
		$this->form_validation->set_rules('message', 'message', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="field-validation-error">', '</div>');
		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$contact = Contact::create($_POST);
				if($contact->is_invalid()){
					$this->session->set_flashdata('error', 'There where errors saving the message');
					redirect('main/contact');
				}
				else{
					$this->load->library("email");
					$name = $_POST['name']; 
					$email = $_POST['email']; 
					$subject = $_POST['subject']; 
					$message = $_POST['message']; 
					$settings = Setting::first();
        			$to = $settings->email;
        			$this->email->send_email($subject, $to, $message);
					$this->session->set_flashdata('success', 'Message sent successfuly');
					redirect('main/contact');
				} 
			}
		}
		$data['menu'] = 'contact';
		$data['settings'] =  Setting::first();
		$this->template->title('Contact')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'Contact')
        ->build($this->user_folder.'/contact', $data);
	}

	public function login(){
		$this->template->title('Login Panel')
        ->set_layout($this->modal_tpl)
        ->set('page_title', 'Login')
        ->build($this->user_folder.'/login_modal');
	}
	public function createtest(){
		$this->template->title('Login Panel')
        ->set_layout($this->modal_tpl)
        ->set('page_title', 'Buat Test Online')
        ->build($this->user_folder.'/create_test');
	}
	public function register(){
		$this->form_validation->set_rules('first_name', 'first name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'last name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('company', 'company', 'trim|xss_clean');
		$this->form_validation->set_rules('phone', 'phone', 'trim|xss_clean');
		$this->form_validation->set_rules('regpassword', 'password', 'required|xss_clean');
		$this->form_validation->set_rules('cpassword', 'confirm password', 'required|matches[regpassword]|xss_clean');

		if($this->form_validation->run())
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('regpassword');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
			);
			$groups=array();
			if(isset($_POST['id_group'])){$groups=array($_POST['id_group']);}
			if($this->ion_auth->register($username, $password, $email, $additional_data,$groups))
			{
				$response = array(
					'success'           => 1,
				);
			}
			else{
				$errors = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				$response = array(
					'success'           => 0,
					'validation_errors' => $errors,
				);
			}
		}
		else
		{
			$this->load->helper('json_error');
			$response = array(
				'success'           => 0,
				'validation_errors' => json_errors()
			);
		}
		echo json_encode($response);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */