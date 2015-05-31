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
                <th style="width: 2%"></th>
                <th style="width: 10%">Name</th>
                <th style="width: 20%">Description</th>
                <th style="width: 10%">Available From</th>
                <th style="width: 10%">Available To</th>
                <th style="width: 7%">Questions</th>
                <th style="width: 15%">Action</th>
            </tr>
            </thead>
            <?php 
            	if(!empty($exams)) { 
                    $count = 1;
            		foreach ($exams as $exam) {
            ?>
            	<tr>
                <td><?php echo $count; ?>.</td>
                <td><?php echo $exam->name; ?></td>
                <td><?php echo limit_text($exam->description); ?></td>
                <td><?php echo format_date($exam->available_from); ?></td>
                <td><?php echo format_date($exam->available_to); ?></td>
                <td><?php echo $exam->questions; ?> <a href="<?php echo  site_url('admin/questions/manage/'.$exam->id); ?>" class="btn btn-xs bg-maroon"> Manage</a></td>
                <td>
                    <?php echo view_btn('admin/exams/view/'.$exam->id); ?>
                    <?php echo edit_btn('admin/exams/edit/'.$exam->id); ?>
                    <?php echo delete_btn('admin/exams/delete/'.$exam->id); ?>
                </td>
            	</tr>
            <?php		$count++;	# code...
            		}
            	} ?>
            
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>