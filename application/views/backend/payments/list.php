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
                <th style="width: 10%">Exam</th>
                <th style="width: 10%">Date</th>
                <th style="width: 10%">Amount</th>
                <th style="width: 10%">Payer Name</th>
                <th style="width: 10%">Payer Email</th>
                <th style="width: 10%">Paypal Transaction Id</th>
                <th style="width: 10%">Payment Status</th>
            </tr>
            </thead>
            <?php 
            	if(!empty($payments)) { 
                    $count = 1;
            		foreach ($payments as $payment) {
            ?>
            	<tr>
                <td><?php echo $count; ?>.</td>
                <td><?php echo ($payment->user) ? $payment->user->first_name . ' ' . $payment->user->last_name : '' ; ?></td>
                <td><?php echo $payment->exam->name; ?></td>
                <td><?php echo format_date($payment->created_at); ?></td>
                <td><?php echo $payment->amount; ?></td>
                <td><?php echo $payment->payer_name; ?></td>
                <td><?php echo $payment->payer_email; ?></td>
                <td><?php echo $payment->paypal_transaction_id; ?></td>
                <td><?php echo payment_status_label($payment->payment_status); ?></td>
            	</tr>
            <?php		$count++;	# code...
            		}
            	} ?>
            
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>