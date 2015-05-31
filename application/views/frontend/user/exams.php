<div id="service">
<div class="container middlecontent">
	<h4 class="page-header">My Exams</h4>
    <div class="row">
    	<?php
    	if($userexams){
    		foreach ($userexams as $userexam) { 
    			$questions  =  Question::find_all_by_exam_id($userexam->exam->id, array('include' => array('answer')));
    			$exam_marks = 0;
    			$user_marks = 0;
    			if($questions){
	    			foreach ($questions as $question) {
	    				$exam_marks += $question->marks;
	    				$correct_answers = array();
	    				foreach ($question->answer as $answer) {
	    					if($answer->correct == 1){
	    						array_push($correct_answers, $answer->id);
	    					}
	    				}
	    				$useranswer = Userquestion::find_by_user_id_and_question_id($userexam->user_id, $question->id);
	    				if(!empty($useranswer)){
		    				if(in_array($useranswer->answer, $correct_answers)){
		    					$user_marks  += $question->marks;
		    				}
	    				}
	    			}
    			}
    			$perfomance = ($exam_marks != 0)  ?  ($user_marks/$exam_marks) * 100 : 0;
    			$perfomance = $perfomance.'%';
    		?>
	    		<div class="col-lg-6">
	    			<div class="panel panel-primary">
			        	<div class="panel-heading">
			              <h4 class="panel-title"><?php echo $userexam->exam->name; ?></h4>
			            </div>
			        <div class="panel-body">
						<div class="row">
							<div class="col-lg-12">Date of Exam <?php echo format_date($userexam->start); ?> <br> <br> </div><!--/col-lg-8 -->
						</div>
						<div class="row">
							<div class="col-lg-12 ">
								<label>Your Score  <?php echo $perfomance; ?></label>
								<div class="progress">
								    <div class="progress-bar progress-bar-success" style="width: <?php echo $perfomance; ?>;">
								        <span class="sr-only"><?php echo $perfomance; ?></span>
								    </div>
								</div>
							</div>

							<div class="col-lg-12 ">
								<label>Pass Mark <?php echo $userexam->exam->pass_mark; ?>%</label>
								<div class="progress">
								    <div class="progress-bar" style="width: <?php echo $userexam->exam->pass_mark; ?>%;">
								        <span class="sr-only"><?php echo $userexam->exam->pass_mark; ?>%</span>
								    </div>
								</div>
							</div>
						</div><!--/row -->

						<div class="row">
							<div class="col-lg-4"><p><a class="btn btn-warning" href="<?php echo site_url('exams/viewresults/'.$userexam->exam->id); ?>">View Results</a></p></div>
							<div class="col-lg-4"><p><a class="btn btn-info" target="_blank"  href="<?php echo site_url('exams/certificate/'.$userexam->exam->id); ?>">Certificate</a></p></div>
							<div class="col-lg-4"><p><a class="btn btn-success" href="<?php echo site_url('exams/takeexam/'.$userexam->exam->id); ?>">Retake Exam</a></p></div>
						</div>

			        </div>
			       </div>
	    		</div>
    		<?php 
    		}
    	}
    	else{ ?>
    		<div class="callout callout-info">
		        <h4>You have not attempted any exams so far!</h4>
		    </div>
    	<?php } ?>

</div>
</div>
</div>