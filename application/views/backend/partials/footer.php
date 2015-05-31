 <div id="modal_content" class="modal fade"></div>

<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
<!-- Jquery validate -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
    	window.setTimeout(function() { $(".alert-dismissable").hide('slow'); }, 5000);
        //bootstrap WYSIHTML5 - text editor
        $(".editor").wysihtml5();

        //Initialize datatable
        $(".table").dataTable({ "bLengthChange": false });

   		//Initialize dateinput mask
        $(".datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});

		 $('form').validate(
		 {
		 	  ignore: [], 
			  highlight: function(element) {
			    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			  },
			  success: function(element) {
			    element
			    .closest('.form-group').removeClass('has-error').addClass('has-success');
			  }
		 });

		 //Popover
		  $('.btn_delete').popover({ html : true, singleton : false});
		  $(document).on("click", '.btn-delete', function (e) {
		  	 e.preventDefault(); 
		  	 var btn = $(this);
		  	 var url = $(this).attr('href');

		  	  	$.ajax({
			        url: url,
			        type: 'post',
			        data: {},
			        beforeSend: function(){
			           $(this).addClass('disabled'); 
			        },
			        success: function(response){
			           $('.btn_delete').popover('hide'); 
			           btn.parents('tr').remove(); 
			        }
			    });
			    return false;

		  });
		  $(document).on("click", '.btn-close', function (e) {$('.btn_delete').popover('hide'); });
		    
		$('body').on('click', function (e) {
		    $('.btn_delete').each(function () {
		        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
		            $(this).popover('hide');
		        }
		    });
		});

// Load modal windows via ajax.
	$('a.toggle-modal').bind('click',function(e) {
	  e.preventDefault();
	  var url = $(this).attr('href');
	  if (url.indexOf('#') == 0) {
	    $('#modal_content').modal('open');
	  } else {
	    $.get(url, function(data) { 
                $('#modal_content').modal();
                $('#modal_content').html(data);
	    }).success(function() { $('input:text:visible:first').focus(); });
	  }
	});
	$.ajaxSetup ({
	    // Disable caching of AJAX responses
	    cache: false
	});
 });
</script>