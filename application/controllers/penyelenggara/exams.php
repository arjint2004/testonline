<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exams extends Backend_Controller {
	protected $activemenu = 'exams';

	public function __construct()
	{
		parent::__construct();
		$this->template->set('activemenu', $this->activemenu);
	}

	public function index(){
		$data['exams'] = Exam::find('all', array('order'=>'id DESC'));
		$this->template->title('Administrator Panel : manage exams')
        ->set_layout($this->admin_tpl)
        ->set('page_title', 'Exams')
        ->build($this->admin_folder.'/exams/list', $data);
	}

	public function create(){
		if($_POST){
			unset($_POST['_wysihtml5_mode']);
			$_POST['available_from'] = date('Y-m-d', strtotime($_POST['available_from']));	
			$_POST['available_to'] = date('Y-m-d', strtotime($_POST['available_to']));	
			$exam = Exam::create($_POST);
			if($exam->is_invalid()){
				$this->session->set_flashdata('error', 'There where errors saving the exam');
				redirect('admin/exams/create');
			} 
			$this->session->set_flashdata('success', 'Exam added successfuly');
			redirect('admin/exams');
		}
		else{
			$categories = Category::find('all', array('order'=>'id DESC'));
			$this->template->title('Administrator Panel : create exam')
	        ->set_layout($this->admin_tpl)
	        ->set('page_title', 'Create Exam')
	        ->set('form_action', 'admin/exams/create')
	        ->set('categories', $categories)
	        ->build($this->admin_folder.'/exams/_exams');
		}
	}

	public function view($id){
	$exam = Exam::find($id);
	$this->template->title('Administrator Panel : view exam')
        ->set_layout($this->modal_tpl)
        ->set('page_title', 'View Exam')
        ->set('exam', $exam)
        ->build($this->admin_folder.'/exams/view');
	}
	public function share($id){
	$exam = Exam::find($id);
	$this->template->title('Administrator Panel : Share exam')
        ->set_layout($this->modal_tpl)
        ->set('page_title', 'Share Exam')
        ->set('exam', $exam)
        ->build($this->admin_folder.'/exams/share');
	}
	public function searchmember($id){
		echo '<li data-option-array-index="1" style="" class="active-result">American Black Bear</li><li data-option-array-index="2" style="" class="active-result">Asiatic Black Bear</li><li data-option-array-index="3" style="" class="active-result">Brown Bear</li><li data-option-array-index="4" style="" class="active-result">Giant Panda</li><li data-option-array-index="5" style="" class="result-selected">Sloth Bear</li><li data-option-array-index="6" style="" class="disabled-result">Sun Bear</li><li data-option-array-index="7" style="" class="result-selected">Polar Bear</li><li data-option-array-index="8" style="" class="disabled-result">Spectacled Bear</li>';
	}
	public function edit($id){
		$exam = Exam::find($id);
		if($_POST){
			$id = $this->input->post('exam_id');
			unset($_POST['_wysihtml5_mode']);
			unset($_POST['exam_id']);	
			$_POST['available_from'] = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['available_from'])));	
			$_POST['available_to'] = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['available_to'])));	
			$exam->update_attributes($_POST);
			if($exam->is_invalid()){
				$this->session->set_flashdata('error', 'There where errors saving the exam');
				redirect('admin/exams/edit');
			} 
			$this->session->set_flashdata('success', 'Exam updated successfuly');
			redirect('admin/exams');
		}
		else{
			$categories = Category::find('all', array('order'=>'id DESC'));
			$this->template->title('Administrator Panel : edit exam')
	        ->set_layout($this->admin_tpl)
	        ->set('page_title', 'Edit Exam')
	        ->set('form_action', 'admin/exams/edit/'.$id)
	        ->set('exam', $exam)
	        ->set('categories', $categories)
	        ->build($this->admin_folder.'/exams/_exams');
    	}
	}

	public function delete($id){
		$exam = Exam::find($id);
		$exam->delete();
	}
}