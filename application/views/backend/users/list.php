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
                <th style="width: 10%">First Name</th>
                <th style="width: 10%">Last Name</th>
                <th style="width: 10%">Email</th>
                <th style="width: 10%">Phone</th>
                <th style="width: 10%">User Type</th>
                <th style="width: 5%">Status</th>
                <th style="width: 25%">Action</th>
            </tr>
            </thead>
            <?php 
            	if(!empty($users)) { 
                    $count = 1;
                    $loggeduser = $this->ion_auth->user()->row();
            	foreach ($users as $user) {
                    if($loggeduser->id != $user->id){
                ?>
                	<tr>
                    <td><?php echo $count; ?>.</td>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->phone; ?></td>
                    <td><?php $groups = $this->ion_auth->get_users_groups($user->id)->result(); 
                         foreach ($groups as $row){
                            echo $row->name.' <br/>';
                            }
                    ?>
                    </td>
                    <td><?php echo status_label($user->active); ?></td>
                    <td>
                        <?php echo view_btn('admin/users/view/'.$user->id); ?>
                        <?php echo edit_btn('admin/users/edit/'.$user->id); ?>
                        <?php echo ($user->active == 1)  ? deactivate_btn('admin/users/deactivate/'.$user->id) : activate_btn('admin/users/activate/'.$user->id); ?>
                        <?php echo delete_btn('admin/users/delete/'.$user->id); ?>
                    </td>
                	</tr>
            <?php		$count++;	# code...
            		}}
            	} ?>
            
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>