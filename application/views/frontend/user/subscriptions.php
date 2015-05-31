<div id="service">
<div class="container middlecontent">
    <div class="row">
       
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title"> My Subscriptions </h4>
                    </div>
                      <div class="panel-body">
                        <table class="table datatable table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="30%">Exam</th>
                                    <th class="text-right" width="10%">Cost</th>
                                    <th width="15%">Payer Name</th>
                                    <th width="15%">Payer Email</th>
                                     <th width="15%">Transaction id</th>
                                    <th width="10%">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                 if (!empty($subscriptions)) {
                                     $count=1; foreach ($subscriptions as $subscription) { 
                                    $exam = Exam::find($subscription->exam_id);
                                    ?>
                                        <tr>
                                            <th><?php echo $count; ?></th>
                                            <th><?php echo $exam->name;?></th>
                                            <th class="text-right"><?php echo format_amount($subscription->amount); ?></th>
                                            <th><?php echo $subscription->payer_name; ?></th>
                                            <th><?php echo $subscription->payer_email; ?></th>
                                            <th><?php echo $subscription->paypal_transaction_id; ?></th>
                                            <th><?php echo format_date($subscription->created_at); ?></th>
                                        </tr>
                                    <?php $count++; }
                                 }
                                 ?>
                                </tbody>
                        </table>
                        </div>
                  </div>
    </div>
</div>
</div>