<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function manage($exam_id){
		$exam = Exam::find($exam_id, array('include'=>array('question')));
		//$questions = Question::find('all', array('include'=>array('question')));
		$this->template->title('Administrator Panel : manage questions')
        ->set_layout($this->admin_tpl)
        ->set('page_title', 'Manage Questions')
        ->set('form_action', 'admin/questions/create/')
        ->set('exam', $exam)
        ->build($this->admin_folder.'/questions/list');
	}

	public function create(){
		if($_POST){
			unset($_POST['_wysihtml5_mode']);
			$exam_id = $this->input->post('exam_id');
			//upload question image if any
			$config['upload_path'] = QUEIMGS;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['width']  = '300';

			$this->load->library('upload', $config);
			$image = '';
			if ( ! $this->upload->do_upload('que_img'))
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
				$image = QUEIMGS.$data['upload_data']['file_name'];
			}

			$question =  new Question(
						array('exam_id'=>$exam_id, 'question' => $_POST['question'], 'image'=>$image, 'marks'=>$_POST['marks']));
			
			$question->save();

			//saving the answer
			for($count = 1; $count <= 4; $count++){
				$answer = new Answer();
				$answer->question_id 	= $question->id;
				$answer->answer 		= $this->remove_empty_tags_recursive ($_POST['answer-'.$count]);
				$answer->correct  		= $_POST['correct-'.$count];;
				$answer->save();
			}
			$this->session->set_flashdata('success', 'Question has been added');
			redirect('admin/questions/manage/'.$exam_id);
		}
	}

	public function edit($id){
		$question = Question::find($id, array('include'=>array('answer')));
		if($_POST){
			$id = $this->input->post('question_id');
			//upload question image if any
			$config['upload_path'] = QUEIMGS;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['width']  = '300';

			$this->load->library('upload', $config);
			$image = '';
			if ( ! $this->upload->do_upload('que_img'))
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
				if($question->image != ''){
					unlink($question->image);
				}
				$data = array('upload_data' => $this->upload->data());
				$image = QUEIMGS.$data['upload_data']['file_name'];
			}	

			$attributes = array('question' => $_POST['question'],
								 'marks' => $_POST['marks']
							);
			if($image != '')
			{
				$attributes['image'] = $image;
			}
			$question->update_attributes($attributes);

			//saving the answer
			for($count = 1; $count <= 4; $count++){
				$answer = Answer::find($_POST['answer_id-'.$count]);
				$answer_attributes = array('answer' => $this->remove_empty_tags_recursive ($_POST['answer-'.$count]),
											'correct' => $_POST['correct-'.$count],
					);
				$answer->update_attributes($answer_attributes);
			}
			$this->session->set_flashdata('success', 'Question updated successfuly');
			redirect('admin/questions/manage/'.$question->exam_id);
		}
		else{
			$this->template->title('Administrator Panel : edit question')
	        ->set_layout($this->admin_tpl)
	        ->set('page_title', 'Edit Question')
	        ->set('form_action', 'admin/questions/edit/'.$id)
	        ->set('question', $question)
	        ->build($this->admin_folder.'/questions/edit');
    	}
	}

	public function view($id){
		$question = Question::find($id, array('include'=>array('answer')));
		$this->template->title('Administrator Panel : view question')
	        ->set_layout($this->modal_tpl)
	        ->set('page_title', 'View Question')
	        ->set('question', $question)
	        ->build($this->admin_folder.'/questions/view');
	}

	public function delete($id){
		$question = Question::find($id);
		$question->delete();
	}

	public function remove_empty_tags_recursive ($str, $repto = NULL)
	{
	    //** Return if string not given or empty.
	    if (!is_string ($str)
	        || trim ($str) == '')
	            return $str;

	    //** Recursive empty HTML tags.
	    return preg_replace (

	        //** Pattern written by Junaid Atari.
	        '/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU',

	        //** Replace with nothing if string empty.
	        !is_string ($repto) ? '' : $repto,

	        //** Source string
	        $str
	    );
	}
}
