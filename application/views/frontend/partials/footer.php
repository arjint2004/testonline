<div id="footerwrap" class="navbar-fixed-bottom">
	<div class="container">
 	 			<?php $settings =  Setting::first(); ?>
 				<?php if($settings->facebook_url != '') { ?>
 				<a href="<?php echo $settings->facebook_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
 				<?php } ?>
 				<?php if($settings->twitter_url != '') { ?>
 				<a href="<?php echo $settings->twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
 				<?php } ?>
 				<?php if($settings->instagram_url != '') { ?>
 				<a href="<?php echo $settings->instagram_url; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
 				<?php } ?>
 				<?php if($settings->tumblr_url != '') {?>
 					<a href="<?php echo $settings->tumblr_url; ?>" target="_blank"><i class="fa fa-tumblr"></i></a>
 				<?php } ?>
 			<span class="pull-right">&copy; Online Exam System - 2014</span>
 </div>

</div>
<div id="modal_content" class="modal fade"></div>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
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

	//Initialize datatable
     $(".datatable").dataTable({ "bLengthChange": false });
});
</script>