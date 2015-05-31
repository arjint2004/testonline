<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
        <?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
        <div class="box box-primary">
			<?php echo form_open($form_action);  ?>
			<?php if(isset($exam)){
				echo form_hidden('exam_id', $exam->id);
			}
			?>
			<div class="box-body">
	            <div class="row">
		            <div class="col-xs-6">
		            	<div class="form-group col-xs-12">
			                <label>Category</label>
			                <select class="form-control required" name="category_id">
			                	<option value="">Select</option>
			                	<?php foreach ($categories as $category) { ?>
			                		<option value="<?php echo $category->id; ?>" <?php echo (isset($exam) && $exam->category_id == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
			                	<?php } ?>
			                	
			                </select>
			            </div>
			            <div class="form-group col-xs-12">
			                <label>Name</label>
			                <input type="text" class="form-control required" name="name" value="<?php echo (isset($exam)) ? $exam->name : ''; ?>" />
			            </div>
			             <div class="form-group col-xs-12">
			                <label>Description</label>
			                <textarea class="form-control ckeditor required" rows="10" id="exameditor" name="description"><?php echo (isset($exam)) ? $exam->description : '';?></textarea>
									<script type="text/javascript">

										var editor =CKEDITOR.replace( 'exameditor',{skin : 'office2003'});
										CKFinder.setupCKEditor( editor, '<?=base_url()?>assets/js/ckfinder/' ) ;
											 //CKFinder.SetupCKEditor( editor, { BasePath : "assets/js/ckfinder/", RememberLastFolder : false } ) ;
										//]]>
									</script>	
			            </div>
			            <div class="form-group col-xs-12">
			                <label>Available From</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control required datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="available_from" value="<?php echo (isset($exam)) ? format_date($exam->available_from) : ''; ?>" />
                            </div><!-- /.input group -->
			            </div>

			          
			        </div>
			        <div class="col-xs-6">

			        	<div class="form-group col-xs-12">
			                <label>Available To</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control required datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="available_to" value="<?php echo (isset($exam)) ? format_date($exam->available_to) : ''; ?>" />
                            </div><!-- /.input group -->
			            </div>
			            <div class="form-group col-xs-12">
			                <label>Duration  (mins)</label>
			                <input type="text" class="form-control required number" name="duration" value="<?php echo (isset($exam)) ? $exam->duration : ''; ?>" />
			            </div>
			            <div class="form-group col-xs-12">
			                <label>Number of questions</label>
			                <input type="text" class="form-control required digits" name="questions" value="<?php echo (isset($exam)) ? $exam->questions : ''; ?>" />
			            </div>
			            <div class="form-group col-xs-12">
			                <label>Pass Mark (%) </label>
			                <input type="text" class="form-control required digits" maxlength="3" name="pass_mark" value="<?php echo (isset($exam)) ? $exam->pass_mark : ''; ?>" />
			            </div>
			            <div class="form-group col-xs-12">
			                <label>Type</label>
			                <select class="form-control required" name="type">
			                	<option value="">Select</option>
			                	<option value="free" <?php echo (isset($exam) && $exam->type == "free") ? 'selected' : ''; ?>>Free</option>
			                	<option value="paid" <?php echo (isset($exam) && $exam->type == "paid") ? 'selected' : ''; ?>>Paid</option>
			                </select>
			            </div>
			             <div class="form-group col-xs-12">
			                <label>Cost</label>
			                <input type="text" class="form-control required digits" name="cost" value="<?php echo (isset($exam)) ? $exam->cost : '0'; ?>" />
			            </div>

			            <div class="form-group col-xs-12">
			                <label>Status</label>

			                <div class="radio">
                            <label>
                                <input type="radio" name="active" id="yes" value="1" <?php echo (isset($exam) && $exam->active == 1) ? 'checked' : ''; ?>>
                                 <small class="badge bg-green">Active</small>
                            </label>
                        	</div>
	                        <div class="radio">
	                            <label>
	                                <input type="radio" name="active" id="no" value="0" <?php echo (isset($exam) && $exam->active == 0) ? 'checked' : ''; ?>>
	                                <small class="badge bg-red">Inactive</small>
	                            </label>
	                        </div>
			            </div>


			        </div>
			     </div>
			</div>
			<div class="box-footer clearfix">
				<div class="form-group col-xs-12">
                <button type="submit" class="btn btn-primary  pull-right">Submit</button>
            </div>
            </div>
			<?php echo form_close();  ?>
		</div>
	</div>
</div>