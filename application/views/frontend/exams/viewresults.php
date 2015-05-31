<div id="service">
<div class="container middlecontent">
	<div class="row">
	
	<div class="col-lg-10">
		<h4>Exam Results Summary</h4>
		<div class="hline"></div>
		<br>
	</div>
	<div class="col-lg-2"><a class="btn btn-warning" href="<?php echo site_url('users/exams'); ?>"> My Exams History</a></div>
	</div>
    	<div class="panel panel-primary">
    		<div class="panel-heading">Exam Information</div>
    		<div class="panel-body">
    			<table class="table table-striped">
    				<tr><td width="20%">Name</td><td><?php echo $exam->name; ?></td> </tr>
    				<tr><td>Description</td><td><?php echo $exam->description; ?></td> </tr>
    				<tr><td>Duration</td><td><span class="btn btn-sm btn-success"><?php echo $exam->duration; ?> Minutes</span> </td> </tr>
    				<tr><td>Questions</td><td><span class="btn btn-sm btn-success"><?php echo $exam->questions; ?> </span> </td> </tr>
    				<tr><td>Pass Mark</td><td><span class="btn btn-sm btn-success"><?php echo $exam->pass_mark; ?> %</span> </td> </tr>
    			</table>
    		</div>
    	</div>
    	<div class="panel panel-primary">
    		<div class="panel-heading">Results Summary</div>
    		<div class="panel-body">
    			<label>Attempted <?php echo $performance['questions_answered']; ?></label>
				<div class="progress">
				    <div class="progress-bar progress-bar-info" style="width: <?php echo $performance['answered_percent']; ?>%;">
				        <span class="sr-only"></span>
				    </div>
				</div>
				<label>Answered correctly <?php echo $performance['questions_answered_correct']; ?></label>
				<div class="progress">
				    <div class="progress-bar progress-bar-success" style="width: <?php echo $performance['correct_percent']; ?>%;">
				        <span class="sr-only"></span>
				    </div>
				</div>
				<label>Answered wrongly <?php echo $performance['questions_answered_wrong']; ?></label>
				<div class="progress">
				    <div class="progress-bar progress-bar-danger" style="width: <?php echo $performance['wrong_percent']; ?>%;">
				        <span class="sr-only"></span>
				    </div>
				</div>

				<label>Duration Taken <?php echo timeDiff($user_exam->start, $user_exam->end); ?></label>
				<?php  
					$time_taken = round(abs(strtotime($user_exam->end) - strtotime($user_exam->start)) / 60);
					$duration_percentage = ($time_taken / $exam->duration) * 100; 
				 ?>
				<div class="progress">
				    <div class="progress-bar progress-bar-warning" style="width: <?php echo $duration_percentage; ?>%;">
				        <span class="sr-only"></span>
				    </div>
				</div>

				<label>Results Status</label>
				<p><span class="btn <?php echo ($performance['performance']  >= $exam->pass_mark) ? 'btn-success' : 'btn-danger'; ?>">
				<?php echo ($performance['performance']  >= $exam->pass_mark) ? 'Passed' : 'Failed'; ?></span></p>
    		</div>
    	</div>
    	<div class="panel panel-primary">
    		<div class="panel-heading">Failed Questions</div>
    		<div class="panel-body">
    			<?php if($questions){ ?>
    			<table class="table table-striped table-bordered">
    				<thead>
    					<th width="5%"></th>
    					<th>Question</th>
    					<th width="5%">Marks</th>
    				</thead>
    				<?php $count = 1; foreach ($questions as $question) {
    					if(!in_array($question->id, $performance['attempted_correct'])){
    					?>
    					<tr><td><?php echo $count;?>.</td><td><?php echo $question->question; ?></td><td><?php echo $question->marks; ?></td></tr>
    				<?php $count++; }} ?>
    			</table>
    			<?php } ?>
    		</div>
    	</div>
</div>
</div>