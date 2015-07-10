<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		$data['settings'] = Setting::first();

		$this->template->title('Administrator Panel')
        ->set_layout($this->admin_tpl)
        ->set('page_title', 'Settings')
        ->build($this->admin_folder.'/settings', $data);
	}

	public function update(){
		if($_POST){
			$config['upload_path'] = MEDIAFOLDER;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['width']  = '300';
			$settings = Setting::first();

			$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('logo'))
				{
					$error = $this->upload->display_errors('', ' ');
					if($error != "You did not select a file to upload."){
						//$this->session->set_flashdata('error', $error);
					}
					else{
						$this->session->set_flashdata('error', $error);
					}
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$_POST['logo'] = MEDIAFOLDER.$data['upload_data']['file_name'];
				}

				//uploading the siganture settings images
				if(!empty($_FILES['certificate_logo']['name'])){
					$upload_response = $this->upload_image('certificate_logo');
					if($upload_response['success']){
						if(is_file(MEDIAFOLDER.$settings->certificate_logo))
						{
							unlink(MEDIAFOLDER.$settings->certificate_logo);
						}
						$_POST['certificate_logo']  = $upload_response['upload_data']['file_name'];
					}
					else{
						$this->session->set_flashdata('error', $upload_response['msg']);
					}
				}
				//uploading the siganture settings images
				if(!empty($_FILES['certificate_signature']['name'])){
					$upload_response = $this->upload_image('certificate_signature');
					if($upload_response['success']){
						if(is_file(MEDIAFOLDER.$settings->certificate_signature))
						{
							unlink(MEDIAFOLDER.$settings->certificate_signature);
						}
						$_POST['certificate_signature']  = $upload_response['upload_data']['file_name'];
					}
					else{
						$this->session->set_flashdata('error', $upload_response['msg']);
					}
				}
				unset($_POST['_wysihtml5_mode']);	
				$settings->update_attributes($_POST);
				$this->session->set_flashdata('success', 'Settings updated successfuly');
				redirect('admin/settings');
		}
		else{
			redirect('admin/settings');
		}
	}

/*-----------------------------------------------------------------------------------------------------------------------
	function to upload user photos
-------------------------------------------------------------------------------------------------------------------------*/
	public function upload_image($fieldname) {
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = MEDIAFOLDER;
		// set the filter image types
		$config['allowed_types'] = 'png|gif|jpeg|jpg';
		$config['max_width'] = '500'; 
		$this->load->helper('string');
		$config['file_name']	 = random_string('alnum', 32);
		//load the upload library
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	
		//if not successful, set the error message
		if (!$this->upload->do_upload($fieldname)) {
			$data = array('success' => false, 'msg' => $this->upload->display_errors());
		}
		else
		{ 
			$upload_details = $this->upload->data(); //uploading
			$data = array('success' => true, 'upload_data' => $upload_details, 'msg' => "Upload success!");
		}
		return $data;
	}
}
