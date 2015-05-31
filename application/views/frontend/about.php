 <div class="container middlecontent">
 	<div class="row">
	
 		<div class="col-lg-12">
 			<h4 class="page-header">About Us</h4>
 			<?php if($content != '') { 
 				echo $content; 
 			?>
 			<p><br/><a href="<?php  echo site_url('main/contact');?>" class="btn btn-info">Contact Us</a></p>
 			<?php }  else { ?>
				<div class="callout callout-info">
				    <h4>About content has not been added by the admin !</h4>
				</div>
 			<?php } ?>
 		</div>
 	</div><!--/row -->
 </div><!--/container -->