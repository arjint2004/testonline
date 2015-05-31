<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
        <?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
        <div class="box box-primary">

			<?php echo form_open($form_action);  ?>
			<?php if(isset($category)){
				echo form_hidden('category_id', $category->id);
			}
			?>
			<div class="box-body">
	            <div class="row">
		            <div class="col-xs-7">
			            <div class="form-group col-xs-12">
			                <label>Name</label>
			                <input type="text" class="form-control required" name="name" value="<?php echo (isset($category)) ? $category->name : ''; ?>" />
			            </div>
			             <div class="form-group col-xs-12">
			                <label>Description</label>
			                <textarea class="form-control editor" rows="10" name="description"><?php echo (isset($category)) ? $category->description : '';?></textarea>
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