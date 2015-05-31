	<div class="row">
		<div class="col-md-12">
			<?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
			<?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
		<div class="box box-primary">	
		<form role="form" method="POST" action="<?php echo site_url('admin/account/'); ?>" enctype="multipart/form-data">
		<div class="box-body">
			<div class="row">
				<div class="col-xs-8">
						 <div class="form-group col-xs-12">
						    <label for="firstname">First Name</label>
						    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user->first_name; ?>">
						    <?php echo form_error('firstname'); ?>
						  </div>
						  <div class="form-group col-xs-12">
						    <label for="lastname">Last Name</label>
						    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user->last_name; ?>">
						    <?php echo form_error('lastname'); ?>
						  </div>
						  <div class="form-group col-xs-12">
						    <label for="phone">Phone</label>
						    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->phone; ?>">
						    <?php echo form_error('phone'); ?>
						  </div>
						   <div class="form-group col-xs-12">
						    <label for="email">Email</label>
						    <input type="email" class="form-control" id="email" name="email"  disabled value="<?php echo $user->email; ?>">
						  </div>
						  <div class="form-group col-xs-12">
						    <label for="company">Company</label>
						    <input type="text" class="form-control" id="company" name="company" value="<?php echo $user->company; ?>">
						    <?php echo form_error('company'); ?>
						  </div>
						  <div class="form-group col-xs-12">
						    <label for="password">Password (Leave blank if not changing password)</label>
						    <input type="password" class="form-control" id="password" name="password" value="">
						    <?php echo form_error('password'); ?>
						  </div>

						  <div class="form-group col-xs-12">
						    <label for="password_confirm">Confirm Password</label>
						    <input type="password" class="form-control" equalTo='#password' id="password_confirm" name="password_confirm" value="">
						    <?php echo form_error('password_confirm'); ?>
						  </div>
				</div>
				<div class="col-lg-4 ">
						<div class="hline"></div>
						<div class="col-lg-12">
						<p><img src="<?php echo  ($user->photo != '') ? base_url().PROFILEPHOTOSTHUMBS.$user->photo : base_url().'assets/img/300.gif';  ?>" class="img-responsive thumbnail center-block" alt="Responsive image"/></p>
						<label>Change Photo</label>
						<input  type="file" name="profilephoto" />
						</div>
					</div>
			</div>
		
		</div>	
		<div class="box-footer clearfix">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div> 
		</form>
	</div>
</div>
</div>

