<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exams extends Frontend_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['categories'] = Category::find('all', array('include'=>'exam'));
		$data['menu'] = 'exams';
		$this->template->title('Available Exams')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'Exams')
        ->build($this->user_folder.'/exams/list', $data);
	}

	public function view($id){
	$exam = Exam::find($id);
	$this->template->title('Administrator Panel : view exam')
        ->set_layout($this->modal_tpl)
        ->set('page_title', 'View Exam')
        ->set('exam', $exam)
        ->build($this->user_folder.'/exams/view');
	}

	public function takeexam($id){
		if (!$this->ion_auth->logged_in())
		{
			$this->template->title('Login Panel')
	        ->set_layout($this->modal_tpl)
	        ->set('page_title', 'Login')
	        ->build($this->user_folder.'/login_modal');
		}
		else{
			$data['exam'] = Exam::find($id);
			$data['menu'] = 'exams';
			$user = $this->ion_auth->user()->row();
			if($data['exam']->type == 'paid' && $data['exam']->cost != 0){
				$subscription = Subscription::find_by_user_id_and_exam_id($user->id, $data['exam']->id);

				if(!empty($subscription)){
					if($subscription->payment_status == 'Completed'){
					$data['subscribed'] = TRUE;
				}else{
					$data['subscribed'] = FALSE;
				}}
			}

			$this->template->title('Take Exam')
	        ->set_layout($this->front_tpl)
	        ->set('page_title', 'Take Exam')
	        ->build($this->user_folder.'/exams/startexam', $data);
		}
	}

	public function buy($id){
		$data['user'] = $this->ion_auth->user()->row();
		$data['exam'] = Exam::find($id);
		$data['menu'] = 'exams';
		$this->template->title('Buy Exam')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'Buy Exam')
        ->build($this->user_folder.'/exams/buyexam', $data);
	}

	public function pay(){
		$pdata  = (object)$this->input->post();
		//get the paypal details
		$setting = Setting::first();
		if($setting->paypal != ''){
			//Pre save the payment data
			$subscription_details = array('user_id' => $pdata->user_id, 
										  'exam_id' => $pdata->exam_id,
										  'amount' => $pdata->amount,
										 );
			$subscription = Subscription::create($subscription_details);		
			$subscription_id = $subscription->id;

			$exam = Exam::find($pdata->exam_id);
		
			$this->load->library('paypal');
			$this->paypal->production = $setting->paypal_mode == 'production' ? TRUE : FALSE;
			$this->paypal->add_field('business', $setting->paypal);
			$this->paypal->add_field('return',  site_url('exams/takeexam/'.$pdata->exam_id)); // return url
			$this->paypal->add_field('rm',  '2'); 
			$this->paypal->add_field('cancel_return', site_url('exams/buy/'.$pdata->exam_id)); // cancel url
			$this->paypal->add_field('notify_url', site_url('paypalipn')); // notify url
			$this->paypal->add_field('item_name', 'Exam - '.$exam->name);
			$this->paypal->add_field('amount', number_format($exam->cost, 2));
					
			$this->paypal->add_field('custom', $subscription_id);
			$this->paypal->submit_paypal_post(); // submit the fields to paypal
		}
		else {
			redirect('exams/buy/'.$exam->id);
		}			
	}

	public function doexam($id){
		$data['exam'] = Exam::find($id);
		$data['menu'] = 'exams';
		$this->template->title('Take Exam')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'Take Exam')
        ->build($this->user_folder.'/exams/doexam', $data);
	}

	public function get_user_exam_data(){
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$examid = $_POST['examId'];
			$examdata = Exam::find($examid, array('include'=>array('question')));
			$exam = array();
			$exam['questions'] = array();
				if (!empty($examdata)) {
					$exam['id'] = $examdata->id;
		        	$exam['name'] = $examdata->name;
					foreach ($examdata->question as $count=>$question) {
						$exam['questions'][$count]['question_id'] = $question->id;
		                $exam['questions'][$count]['text'] = $question->question;
		                $exam['questions'][$count]['image'] = ($question->image  != '') ? '<img src="'.base_url().$question->image.'" />' : '' ;
		                
		                $answers = array();
		                foreach ($question->answer as $answer_count=>$answer) {
		                	$answer_data = array('id' =>$answer->id, 'text'=>trim($answer->answer));
		                	array_push($answers, $answer_data);
		                }
		                $exam['questions'][$count]['answers'] = $answers;
					}
					$this->recordexam_start($examid, $user->id);
				}
		}
		echo json_encode($exam);
	}

	public function save_answer(){
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$p_data = (object)$_POST;

			$answer_record = Userquestion::find_by_user_id_and_question_id($user->id, $p_data->q);
			if($answer_record)
    		$answer_record->delete();

			$user_ans = new Userquestion();
			$user_ans->user_id  	= $user->id;
			$user_ans->exam_id  	= $p_data->id;
			$user_ans->question_id  = $p_data->q;
			$user_ans->filled  		= 'yes';
			$user_ans->answer  		= $p_data->a;
			$user_ans->save();
			$response = 'success';
		}
		else{
			$response = 'relogin';
		}
		echo $response;
	}

	public function recordexam_start($examid, $user)
    {
    	$user_exam = Userexam::find_by_user_id_and_exam_id($user, $examid);
    	if($user_exam){
    		$user_exam->delete();
    	}
    		$exam_start = new Userexam();
    		$exam_start->start 		= date('Y-m-d H:i:s');
    		$exam_start->user_id 	= $user;
    		$exam_start->exam_id 	= $examid;
    		$exam_start->status 	= "inprogress";
    		$exam_start->save();
    }

	public function finish_user_exam(){
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$examid = $_POST['id'];
			$user_exam = Userexam::find_by_user_id_and_exam_id($user->id, $examid);
			$user_exam->update_attributes(array('end'=>date('Y-m-d H:i:s'), 'status' => 'completed'));
			$response = 'success';
		}
		else{
			$response = 'relogin';
		}
		echo $response;
	}

	public function viewresults($id){
		$user = $this->ion_auth->user()->row();
		$data['performance'] = $this->performance($id, $user->id);
		$data['user_exam'] = Userexam::find_by_user_id_and_exam_id($user->id, $id);
		$data['menu'] = 'myexams';
		$data['exam']  = Exam::find($id);
		$data['questions']  = Question::find_all_by_exam_id($id);
		$this->template->title('My Exams')
        ->set_layout($this->front_tpl)
        ->set('page_title', 'My Exams')
        ->build($this->user_folder.'/exams/viewresults', $data);
	}
	public function certificate($id){
		if ($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['exam']  = Exam::find($id);
			$data['performance'] = $this->performance($id, $user->id);
			$data['user_exam'] = Userexam::find_by_user_id_and_exam_id($user->id, $id);

			//$html = $this->load->view($this->user_folder.'/exams/exam_certificate_pdf', $data);
			$data['settings'] = $settings = Setting::first();
			$html = $this->load->view($this->user_folder.'/exams/exam_certificate_pdf', $data, true);


			include(FCPATH."mpdf60/mpdf.php");	
			$mpdf=new mPDF('c','A4-L','','',10,10,10,10,10,10);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->WriteHTML($html);
			$mpdf->Output(FCPATH."downloads/certificate.pdf", 'F');
			if($email == NULL)
				redirect(base_url()."downloads/certificate.pdf");	
		}
	}

	public function performance($exam_id, $user){
		$data = array();
		$questions  =  Question::find_all_by_exam_id($exam_id, array('include' => array('answer')));
		$exam_marks = 0;
		$user_marks = 0;
		$questions_answered = 0;
		$questions_answered_correct = 0;
		$questions_answered_wrong = 0;
		$questions_num = 0;
		$attempted_correct = array();
		if($questions){
			foreach ($questions as $question) {
				$exam_marks += $question->marks;
				$correct_answers = array();
				foreach ($question->answer as $answer) {
					if($answer->correct == 1){
						array_push($correct_answers, $answer->id);
					}
				}
				$useranswer = Userquestion::find_by_user_id_and_question_id($user, $question->id);
				if($useranswer){
					if(in_array($useranswer->answer, $correct_answers)){
						$user_marks  += $question->marks;
						$questions_answered_correct++;
						array_push($attempted_correct, $question->id);
					}
					else{
						$questions_answered_wrong++;
					}
					$questions_answered++;
				}
			}
		}
		$performance = ($exam_marks != 0)  ?  ($user_marks/$exam_marks) * 100 : 0;
		$data['exam_marks']  = $exam_marks;
		$data['user_marks']  = $user_marks;
		$data['performance']  = $performance;
		$data['questions_answered']  = $questions_answered .'/'. count($questions);
		$data['questions_answered_correct']  = $questions_answered_correct .'/'. count($questions);
		$data['questions_answered_wrong']  = $questions_answered_wrong .'/'. count($questions);
		$data['questions']  = count($questions);
		$data['answered_percent'] = (count($questions) != 0) ? ($questions_answered / count($questions)) * 100 : 0;
		$data['correct_percent']  = (count($questions) != 0) ? ($questions_answered_correct / count($questions)) * 100 : 0;
		$data['wrong_percent']    = (count($questions) != 0) ? ($questions_answered_wrong / count($questions)) * 100 : 0;
		$data['attempted_correct']= $attempted_correct;
		return $data;
	}

}