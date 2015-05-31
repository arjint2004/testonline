<html>
	
<head>
<title>PDF Certificate</title>
</head>

<body>
<center>
<div style="width:100%; height:80%; padding:15px; text-align:center; background: url(./assets/img/container-bg.png); border: 10px solid navy">
<div style="width:100%; height:80%; padding:20px; text-align:center; border: 5px solid navy">
		 	<?php
       if(isset($settings->certificate_logo) && $settings->certificate_logo != ''){
                $image_properties = array(
                              'src' => (isset($settings->certificate_logo)) ? base_url().MEDIAFOLDER.$settings->certificate_logo : 'assets/img/15.jpg',
                              'alt' => 'logo',
                              'class' => 'col-xs-4',
                              'title' => 'logo',
                    );
                 echo  img($image_properties);
            }
            $user = $this->ion_auth->user($user_exam->user_id)->row();
        ?>
       <div style="font-size:40px; font-weight:bold;margin-bottom:20px; margin-top:20px">Certificate of Completion</div>
       <div style="font-size:25px;margin-bottom:20px"><i>This is to certify that</i></div>
       <div style="font-size:25px;margin:0 auto; width:40%; border-bottom:1px solid #000"><b><?php echo $user->first_name.' '.$user->last_name;?>.</b></div>
       <div style="font-size:25px;margin:20px"><i>has completed the exam</i></div> 
       <div style="font-size:25px;margin:0 auto; width:50%; border-bottom:1px solid #000"><b><?php echo $exam->name;?></b></div> <br/><br/>
       <div style="font-size:20px;">with score of <b><u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $performance['correct_percent']; ?>%&nbsp;&nbsp;&nbsp;&nbsp;</u></b> from our online academy.</div> <br/><br/>
       <div style="font-size:20px;width:40%;float:left"><i>Dated</i> <b><u>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo format_date($user_exam->start); ?>&nbsp;&nbsp;&nbsp;&nbsp;</u></b></div>
       <div style="font-size:20px;float:right;text-align:right">
        
        <?php 
        if(isset($settings->certificate_signature) && $settings->certificate_signature != ''){
           $image_properties = array(
                                          'src' => base_url().MEDIAFOLDER.$settings->certificate_signature,
                                          'alt' => 'signature',
                                          'width'=>100,
                                          'title' => 'signature',
                                );
            echo  img($image_properties);
        }

        ?>
        <br>
        <i>
        <?php echo $settings->certificate_signature_text; ?>
       </i></div>
</div>
</div>
</center>
</body>

</html>
