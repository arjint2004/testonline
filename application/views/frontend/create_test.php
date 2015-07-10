
  <div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#create" data-toggle="tab">Buat Akun</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="create">
        <form id="tab" class="form-horizontal" method="POST" name="register_frm">
          <fieldset> <legend></legend>
            <div id="regmsg"></div>
          <div class="control-group">
            <label class="control-label">First Name</label>
              <div class="controls">
                <input type="text" name="first_name" class="form-control required" id="first_name">
              </div>
          </div>

          <div class="control-group">
            <label class="control-label">Last Name</label>
              <div class="controls">
                <input type="text" name="last_name" class="form-control required" id="last_name">
              </div>
          </div>

          <div class="control-group">
            <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" name="email" class="form-control required" id="email">
              </div>
          </div>

          <div class="control-group">
            <label class="control-label">Company</label>
            <div class="controls">
              <input type="text" name="company" class="form-control" id="company">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Phone</label>
            <div class="controls">
             <input type="text" name="phone" class="form-control" id="phone">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
             <input type="password" name="regpassword" class="form-control required" id="regpassword">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Confirm Password</label>
            <div class="controls">
             <input type="password" name="cpassword" class="form-control required" id="cpassword">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label"></label>
            <div class="controls"> 
			<input type="hidden" name="id_group" value="3">
            <button class="btn btn-primary" id="registerbtn">Create Account</button>
          </div>
          </div>
        </fieldset>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
   $("#loginbtn").click(function(){
        username=$("#identity").val();
        password=$("#exampleInputPassword1").val();
         $.ajax({
            type: "POST",
            url: "<?php echo site_url('auth/login'); ?>",
            data: "identity="+username+"&password="+password,
            success: function(data){
              var response = JSON.parse(data);
              if(response.loggedin)
              {
                 $("#msg").html("<div class='alert alert-success'><b>Login Successful! Welcome back</b></div>");
                  window.location.reload();
              }
              else
              {
                  $("#msg").html("<div class='alert alert-danger'>"+response.message+"</div>");
              }
            },
            beforeSend:function()
            {
                 $("#msg").html("Loading...")
            }
        });
         return false;
    });

      $("#registerbtn").click(function(){
        var formdata = $("form[name=register_frm]").serialize();
          $.ajax({
            type: "POST",
            url: "<?php echo site_url('main/register'); ?>",
            data: formdata,
            success: function(data){
              var response = JSON.parse(data);
              if(response.success == '1')
              {
                 $("#regmsg").html("<div class='alert alert-success'><b>Registration Successful! Welcome, you can now login</b></div>");
				    var username=$("#email").val();
					var password=$("#regpassword").val();
					 $.ajax({
						type: "POST",
						url: "<?php echo site_url('auth/login'); ?>",
						data: "identity="+username+"&password="+password,
						success: function(data){
						  var response = JSON.parse(data);
						  if(response.loggedin)
						  {
							 $("#msg").html("<div class='alert alert-success'><b>Login Successful! Welcome back</b></div>");
							  window.location.reload();
						  }
						  else
						  {
							  $("#msg").html("<div class='alert alert-danger'>"+response.message+"</div>");
						  }
						},
						beforeSend:function()
						{
							 $("#msg").html("Loading...")
						}
					});
                  //window.location.reload();
              }
              else
              {
                    msg = response.validation_errors;
                    var validation_errors = '';
                    // The validation was not successful
                    $('.control-group').removeClass('has-error');
                    for (var key in msg) {
                        $('#' + key).parent().parent().addClass('has-error');
                        validation_errors = validation_errors +  msg[key];
                    }
                     $("#regmsg").html("<div class='alert alert-danger'>"+validation_errors+"</div>");
              }
            },
            beforeSend:function()
            {
                 $("#regmsg").html("Loading...")
            }
         });
         return false;
    });

});
</script>
</script>
