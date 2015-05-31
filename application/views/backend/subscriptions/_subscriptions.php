<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
        <?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
        <div class="box box-primary">

			<?php echo form_open($form_action);  ?>
			<?php if(isset($subscription)){
				echo form_hidden('subscription_id', $subscription->id);
			}
			?>
			<div class="box-body">
	            <div class="row">
		            <div class="col-xs-7">
			            <div class="form-group col-xs-12">
			                <label>Exam</label>
			                <select class="form-control required" name="exam_id">
			                	<option value="">Select</option>
			                	<?php if($exams) { foreach ($exams as $exam) { ?>
			                		<option value="<?php echo $exam->id; ?>" <?php echo (isset($subscription) && $exam->id == $subscription->exam_id) ? 'selected' : ''; ?>><?php echo $exam->name; ?></option>
			                	<?php } } ?>
			                </select>
			            </div>
			             <div class="form-group col-xs-12">
			                <label>User</label>
			                <select class="form-control required" name="user_id">
			                	<option value="">Select</option>
			                	<?php
			                	if($group->users) {
			                	 foreach ($group->users as $user) {  ?>
			                		<option value="<?php echo $user->id; ?>" <?php echo (isset($subscription) && $user->id == $subscription->user_id) ? 'selected' : ''; ?>><?php echo $user->username; ?></option>
			                	<?php }} ?>
			                </select>
			            </div>
			               <div class="form-group col-xs-12">
			                <label>Amount</label>
			                <input type="text" class="form-control required number" name="amount" value="<?php echo (isset($subscription)) ? $subscription->amount : ''; ?>" />
			            </div>
			        </div>
			     </div>
			</div>
			<div class="box-footer clearfix">
				<div class="form-group col-xs-7">
                <button type="submit" class="btn btn-primary  pull-right">Submit</button>
            </div>
            </div>
			<?php echo form_close();  ?>
		</div>
	</div>
</div>