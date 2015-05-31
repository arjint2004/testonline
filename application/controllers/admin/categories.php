<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Backend_Controller {
	protected $activemenu = 'categories';
	public function __construct()
	{
		parent::__construct();
		$this->template->set('activemenu', $this->activemenu);
	}

	public function index(){
		$data['categories'] = Category::find('all', array('order'=>'id DESC'));
		$this->template->title('Administrator Panel : manage categories')
        ->set_layout($this->admin_tpl)
        ->set('page_title', 'Categories')
        ->build($this->admin_folder.'/categories/list', $data);
	}

	public function create(){
		if($_POST){
			unset($_POST['_wysihtml5_mode']);	
			$category = Category::create($_POST);
			if($category->is_invalid()){
				$this->session->set_flashdata('error', 'There where errors saving the category');
				redirect('admin/categories/create');
			} 
			$this->session->set_flashdata('success', 'Category added successfuly');
			redirect('admin/categories');
		}
		else{
			$this->template->title('Administrator Panel : create category')
	        ->set_layout($this->admin_tpl)
	        ->set('page_title', 'Create Category')
	        ->set('form_action', 'admin/categories/create')
	        ->build($this->admin_folder.'/categories/_categories');
    	}
	}

	public function edit($id){
		$category = Category::find($id);
		if($_POST){
			$id = $this->input->post('category_id');
			unset($_POST['_wysihtml5_mode']);
			unset($_POST['category_id']);		
			$category->update_attributes($_POST);
			if($category->is_invalid()){
				$this->session->set_flashdata('error', 'There where errors saving the category');
				redirect('admin/categories/edit');
			} 
			$this->session->set_flashdata('success', 'Category updated successfuly');
			redirect('admin/categories');
		}
		else{
			$this->template->title('Administrator Panel : edit category')
	        ->set_layout($this->admin_tpl)
	        ->set('page_title', 'Edit Category')
	        ->set('form_action', 'admin/categories/edit/'.$id)
	        ->set('category', $category)
	        ->build($this->admin_folder.'/categories/_categories');
    	}
	}

	public function view($id){
		$category = Category::find($id);
		$this->template->title('Administrator Panel : view category')
	        ->set_layout($this->modal_tpl)
	        ->set('page_title', 'View Category')
	        ->set('category', $category)
	        ->set('form_action', 'admin/categories/edit/'.$id)
	        ->build($this->admin_folder.'/categories/view');
	}

	public function delete($id){
		$category = Category::find($id);
		$category->delete();
	}
}
