<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php echo $exams; ?>
                </h3>
                <p>
                    Exams
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo site_url('admin/exams'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?php echo $subscriptions; ?>
                </h3>
                <p>
                    Subscriptions
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo site_url('admin/subscriptions'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?php echo $users; ?>
                </h3>
                <p>
                    User Registrations
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo site_url('admin/users'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    <?php echo $questions; ?>
                </h3>
                <p>
                    Total questions
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo site_url('admin/exams'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<div class="row">
<div class="col-md-12">
<div >
    <div class="box-header">
        <h4 class="box-title">Recent Subscriptions</h4>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th style="width: 10px"></th>
                <th>User</th>
                <th>Exam</th>
                <th>Amount</th>
                <th>Subscribe on</th>
            </tr>
            <?php 
            if($recent_subscriptions){
                $count = 1;
                foreach ($recent_subscriptions as $subscription) { ?>
                  <tr>
                    <td><?php echo $count; ?></td> 
                    <td><?php echo ($subscription->user) ? $subscription->user->username : ''; ?></td>  
                    <td><?php echo $subscription->exam->name; ?></td>  
                    <td><?php echo $subscription->amount; ?></td>
                    <td><?php echo format_date($subscription->created_at); ?></td>   
                  </tr> 
                <?php
                $count++;
                }
            }
            ?>
 
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
<div class="col-md-12">
<div >
    <div class="box-header">
        <h4 class="box-title">Recent Payments</h4>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped table-hover">
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
            <?php       $count++;   # code...
                    }
                } ?>
            
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->