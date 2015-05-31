<div id="service">
<div class="container middlecontent">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">Change Password</h4>
            </div>
  <div class="panel-body">

            <div class="row">
                  <form role="form" method="POST" action="<?php echo site_url('users/change_password'); ?>"  enctype="multipart/form-data">
                  <div class="col-lg-8">
                  <?php
                  if($this->session->flashdata('success')) { ?>
                  <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Success! </b> <?php echo $this->session->flashdata('success');  ?>
                   </div>
                   <?php } ?>
                    <?php
                        if($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('error');  ?>
                         </div>
                         <?php } ?>
                        <h4>Password Details</h4>
                        <div class="hline"></div> <br>
                          <div class="form-group">
                            <label for="old">Current Password</label>
                            <input type="password" class="form-control" id="old" name="old" />
                            <?php echo form_error('old'); ?>
                          </div>
                          <div class="form-group">
                            <label for="new">New Password</label>
                            <input type="password" class="form-control" id="new" name="new" />
                            <?php echo form_error('new'); ?>
                          </div>
                          <div class="form-group">
                            <label for="new_confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="new_confirm" name="new_confirm" />
                            <?php echo form_error('new_confirm'); ?>
                          </div>
                          <button type="submit" class="btn btn-theme">Submit</button>
                        
                   </div><!--/col-lg-8 -->
                  
                  <div class="col-lg-4">
                        <h4>Profile Photo</h4>
                        <div class="hline"></div>
                        <p><img src="<?php echo  ($user->photo != '') ? base_url().PROFILEPHOTOSTHUMBS.$user->photo : base_url().'assets/frontend/img/300.gif';  ?>" class="img-responsive thumbnail center-block" alt="Responsive image"/></p>
                  </div>
                  </form>
            </div><!--/row -->

              </div>
             </div>

    </div>
   </div>
 </div>