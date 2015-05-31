<div id="service">
<div class="container middlecontent">
    <div class="row">
    	  <div class="panel panel-primary">
	            <div class="panel-heading">
	              <h4 class="panel-title">Edit Profile</h4>
	            </div>
	        <div class="panel-body">

				<div class="row">
					<form role="form" method="POST" action="<?php echo site_url('users/profile'); ?>" enctype="multipart/form-data">
					<div class="col-lg-8">
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
						<h4>Account Details</h4>
						<div class="hline"></div> <br>

						
						  <div class="form-group">
						    <label for="firstname">First Name</label>
						    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user->first_name; ?>">
						    <?php echo form_error('firstname'); ?>
						  </div>
						  <div class="form-group">
						    <label for="lastname">Last Name</label>
						    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user->last_name; ?>">
						    <?php echo form_error('lastname'); ?>
						  </div>
						  <div class="form-group">
						    <label for="phone">Phone</label>
						    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->phone; ?>">
						    <?php echo form_error('phone'); ?>
						  </div>
						   <div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" class="form-control" id="email" name="email"  disabled value="<?php echo $user->email; ?>">
						  </div>

						  <div class="form-group">
						    <label for="company">Company</label>
						    <input type="text" class="form-control" id="company" name="company" value="<?php echo $user->company; ?>">
						    <?php echo form_error('company'); ?>
						  </div>
						  <div class="form-group">
						    <label for="password">Password (Leave blank if not changing password)</label>
						    <input type="password" class="form-control" id="password" name="password" value="">
						    <?php echo form_error('password'); ?>
						  </div>

						  <div class="form-group">
						    <label for="password_confirm">Confirm Password</label>
						    <input type="password" class="form-control" equalTo='#password' id="password_confirm" name="password_confirm" value="">
						    <?php echo form_error('password_confirm'); ?>
						  </div>
						 
						  <button type="submit" class="btn btn-info">Submit</button>
						
				</div><!--/col-lg-8 -->
					
					<div class="col-lg-4 ">
						<h4>Profile Photo</h4>
						<div class="hline"></div>
						<div class="col-lg-12">
						<p>
							<img src="<?php echo  ($user->photo != '') ? base_url().PROFILEPHOTOSTHUMBS.$user->photo : base_url().'assets/img/300.gif';  ?>" class="img-responsive thumbnail center-block" alt="Responsive image"/></p>
						<label>Change Photo</label>
						<input  type="file" name="profilephoto" />
						</div>
					</div>
					</form>
				</div><!--/row -->

	        </div>
	       </div>
    </div>
   </div>
 </div>