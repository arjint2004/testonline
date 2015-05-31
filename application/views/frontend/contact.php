<div class="container middlecontent">
<div class="row">
	<div class="col-lg-8">
		<h4>  <strong>Just Get In Touch!</strong></h4>
		<hr/>
			<p>We will be glad to hear from you</p>
			<?php
			if($this->session->flashdata('success')) { ?>
			<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Success! </b> <?php echo $this->session->flashdata('success');  ?>
             </div>
             <?php } 
             if($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('error');  ?>
             </div>
             <?php } ?>
			
		<form role="form" method="POST" action="<?php echo site_url('main/contact'); ?>">
		  <div class="form-group">
		    <label for="name">Your Name</label>
		    <input type="text" class="form-control required" id="name" name="name" value="<?php echo set_value('name');?>"/>
		    <?php echo form_error('name'); ?>
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="text" class="form-control" id="email" name="email"  value="<?php echo set_value('email');?>"/>
		    <?php echo form_error('email'); ?>
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		   <input type="text" class="form-control" id="subject" name="subject"  value="<?php echo set_value('subject');?>"/>
		   <?php echo form_error('subject'); ?>
		  </div>
		  <div class="form-group">
		  	<label for="message">Message</label>
		  	<textarea class="form-control" id="message" rows="10" style="resize: none" name="message"><?php echo set_value('message');?></textarea>
		  	<?php echo form_error('message'); ?>
		  </div>
		  <button type="submit" class="btn btn-info">Submit</button>
		</form>
</div><!--/col-lg-8 -->
	
	<div class="col-lg-4">
		<h4><strong>Our Address</strong></h4>
		<hr>
			<p>
				<?php echo  $settings->address; ?><br/>
				<?php echo  $settings->city; ?><br/>
			</p>
			<p>
				Email: <?php echo  $settings->email; ?><br/>
				Tel: <?php echo  $settings->phone; ?><br/>
			</p>
			<p><?php echo  $settings->description; ?>.</p>
	</div>
</div><!--/row -->
</div><!--/container -->