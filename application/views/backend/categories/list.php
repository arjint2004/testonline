<div class="row">
<!-- left column -->
<div class="col-md-12">
<?php echo ($this->session->flashdata('error')) ? error_msg($this->session->flashdata('error')) : ''; ?>
        <?php echo ($this->session->flashdata('success')) ? success_msg($this->session->flashdata('success')) : ''; ?>
<div class="box box-info">
    <div class="box-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th style="width: 2%">#</th>
                <th style="width: 15%">Name</th>
                <th style="width: 40%">Description</th>
                <th style="width: 15%">Action</th>
            </tr>
            </thead>
            <?php 
            	if(!empty($categories)) { 
                    $count = 1;
            		foreach ($categories as $category) {
            ?>
            	<tr>
                <td><?php echo $count; ?>.</td>
                <td><?php echo $category->name; ?></td>
                <td><?php echo limit_text($category->description, 200); ?></td>
                <td>
                    <?php echo view_btn('admin/categories/view/'.$category->id); ?>
                    <?php echo edit_btn('admin/categories/edit/'.$category->id); ?>
                    <?php echo delete_btn('admin/categories/delete/'.$category->id); ?>
                </td>
            	</tr>
            <?php		$count++;	# code...
            		}
            	}
                 ?>
            
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>