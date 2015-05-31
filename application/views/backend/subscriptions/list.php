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
                <th style="width: 10%">User</th>
                <th style="width: 20%">Exam</th>
                <th style="width: 10%">Amount</th>
                <th style="width: 10%">Subscribed On</th>
                <th style="width: 10%">Status</th>
                <th style="width: 15%">Action</th>
            </tr>
            </thead>
            <?php 
            	if(!empty($subscriptions)) { 
                    $count = 1;
            		foreach ($subscriptions as $subscription) {
            ?>
            	<tr>
                <td><?php echo $count; ?>.</td>
                <td><?php echo ($subscription->user) ? $subscription->user->first_name . ' ' . $subscription->user->last_name : '' ; ?></td>
                <td><?php echo $subscription->exam->name; ?></td>
                <td><?php echo $subscription->amount; ?></td>
                <td><?php echo format_date($subscription->created_at); ?></td>
                <td><?php echo payment_status_label($subscription->payment_status); ?></td>
                <td>
                    <?php echo view_btn('admin/subscriptions/view/'.$subscription->id); ?>
                    <?php echo edit_btn('admin/subscriptions/edit/'.$subscription->id); ?>
                    <?php echo delete_btn('admin/subscriptions/delete/'.$subscription->id); ?>
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