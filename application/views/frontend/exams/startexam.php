<div id="service">
<div class="container middlecontent">
    <div class="row">
        <h3 style="color:#06F;"><?php echo $exam->name;?></h3>

                      <div class="panel panel-default" style="background:#f2f8fb">
                        <div class="panel-body">
                        <table>
                            <thead>
                                <tr>
                                    <th width="5%"></th>
                                    <th width="80%"></th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                    <td><i class="fa fa-file fa-4x"></i></td>
                                    <td><strong><?php echo $exam->questions;?></strong> multiple choice questions</td>
                                </tr>
                                <tr>
                                    <td><span><i class="fa fa-clock-o fa-4x"></i></span></td>
                                    <td><strong><?php echo $exam->duration;?></strong> minutes exam time</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-thumbs-up fa-4x"></i></td>
                                    <td><strong><?php echo $exam->pass_mark;?>%</strong> mark is needed to pass</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-money fa-4x"></i></td>
                                    <td><strong><?php echo format_amount($exam->cost);?></strong> is required to take this exam</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <br>
                                        <ol>
                                                <li>Attempt all the questions.</li>
                                                <li>Do not use the browser back button while doing this test.</li>
                                                <li>The timer of the exam will not stop once the exam starts.</li>
                                                <li><strong>IMPORTANT!</strong> Remember to click the 'Finish Exam' link at the bottom of the page once you complete the whole exam. Clicking this link before you finish the whole exam will end your exam session.</li>
                                        </ol>
                                    </td>
                                </tr>
                                <tr>
                                        <td> <a class="btn btn-danger" href="<?php echo site_url('exams'); ?> ">Cancel</a> </td>
                                    <td><p>
                                        <?php if($exam->cost != 0 && $exam->type=='paid' ){
                                            if(isset($subscribed)){ ?>
                                            <a class="btn btn-success pull-right" href="<?php echo site_url('exams/doexam/'.$exam->id); ?>">Start Exam</a>
                                            <?php } else{ ?>
                                            <a class="btn btn-info  pull-right" href="<?php echo site_url('exams/buy/'.$exam->id); ?>">Buy Exam</a>
                                            <?php } } else {?>
                                        <a class="btn btn-success pull-right" href="<?php echo site_url('exams/doexam/'.$exam->id); ?>">Start Exam</a>
                                       <?php  } ?>
                                        </p></td>
                                    
                                </tr>
                                                            
                           </tbody>
                        </table>
                        </div>
</div>

</div>
</div>
</div>