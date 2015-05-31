<div class="container middlecontent">
    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-body">
                        <table>
                            <thead>
                                <tr>
                                    <th width="5%"></th>
                                    <th width="80%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan="2"> <h3>Buy Exam</h3> <hr/> </td></tr>
                               <tr>
                                    <td><i class="fa fa-file fa-4x"></i></td>
                                    <td><strong><?php echo $exam->name;?></strong></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-money fa-4x"></i></td>
                                    <td><strong><?php echo format_amount($exam->cost);?></strong> Will be charged.</td>
                                </tr>
                                <tr><td colspan="2"><hr/> </td></tr>
                                <tr>
                                        <td> <a class="btn btn-lg btn-danger" href="<?php echo site_url('exams'); ?> ">Cancel</a> </td>
                                    <td>
                                        <form method="post" action="<?php echo site_url('exams/pay'); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>"/>
                                            <input type="hidden" name="exam_id" value="<?php echo $exam->id; ?>"/>
                                            <input type="hidden" name="amount" value="<?php echo $exam->cost; ?>"/>
                                        <?php if($exam->cost != 0 && $exam->type=='paid' ){ ?>
                                        <button type="submit" style="padding:0; border:0;margin-left:50px"> <img src="<?php echo site_url('assets/img/paypal-btn.gif'); ?>" height="45px"></button>
                                        <?php } ?>
                                        </form>
                                    </td>
                                    
                                </tr>
                                                            
                           </tbody>
                        </table>
                        </div>
</div>

</div>
</div>