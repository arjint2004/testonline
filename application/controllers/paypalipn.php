<?php
class Paypalipn extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('paypal');
		$settings = Setting::first();
		$host = $settings->paypal_mode =='production'  ? 'www.paypal.com'  : 'www.sandbox.paypal.com';
	}

	public function index(){
		if($this->paypal->validate_ipn()){
			  $subscription_id = trim($_POST['custom']);
			  $payer_name = $_POST['first_name'].' '.$_POST['last_name'];
		      $payer_email = $_POST['payer_email'];
			  $payment_status = $_POST['payment_status'];
			  $paypal_transaction_id = $_POST['txn_id'];
			  $subscription = Subscription::find($subscription_id);

		      $subscription_details = array('payer_name'=>$payer_name, 
				 'payer_email'=>$payer_email, 
				 'payment_status'=>$payment_status,
				 'paypal_transaction_id'=>$paypal_transaction_id
			  );
			 $subscription->update_attributes($subscription_details);
		}else{
			  $mail_From    = "IPN@quinexinves.com";
		      $mail_To      = "sammkaranja@gmail.com";
		      $mail_Subject = "IPN NOT VERIFIED";
		      $mail_Body    = 'IPN has not been verified';
		      mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
		}

		
	}
	/*function index()
	{
		   // Send an empty HTTP 200 OK response to acknowledge receipt of the notification 
   		 header('HTTP/1.1 200 OK'); 
		 $req = 'cmd=_notify-validate';               // Add 'cmd=_notify-validate' to beginning of the acknowledgement

		  foreach ($_POST as $key => $value) {         // Loop through the notification NV pairs
		    $value = urlencode(stripslashes($value));  // Encode these values
		    $req  .= "&$key=$value";                   // Add the NV pairs to the acknowledgement
		  }
		 // $req .= '&'.http_build_query($_POST);
  
		 // Set up the acknowledgement request headers
		  $header  = "POST /cgi-bin/webscr HTTP/1.1\r\n";                    // HTTP POST request
		  $header .= "Host: www.sandbox.paypal.com\r\n";
		  $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		  $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

		  // Open a socket for the acknowledgement request
		  $fp = fsockopen('ssl://www.paypal.com', 443, $errno, $errstr, 30);
		  

		  if (!$fp) {

			// HTTP ERROR Failed to connect
			 log_message('error', 'Paypal IPN - HTTP ERROR: '.$errstr);
			  $mail_From    = "IPN@quinexinves.com";
		      $mail_To      = "sammkaranja@gmail.com";
		      $mail_Subject = "HTTP ERROR IPN";
		      $mail_Body    = $errstr;

		      mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
		  }
		  else
		  {
		  // Send the HTTP POST request back to PayPal for validation
		  fputs($fp, $header . $req);

		  while (!feof($fp)) {                     // While not EOF
	         $res = stream_get_contents($fp, 1024);               // Get the acknowledgement response
	         $res = trim($res);
	      if (strcmp ($res, "VERIFIED") == 0) {  // Response contains VERIFIED - process notification

		      // Send an email announcing the IPN message is VERIFIED
		      $mail_From    = "IPN@quinexinves.com";
		      $mail_To      = "sammkaranja@gmail.com";
		      $mail_Subject = "VERIFIED IPN";
		      $mail_Body    = $req;
		      mail($mail_To, $mail_Subject, $mail_Body, $mail_From);

		      // Authentication protocol is complete - OK to process notification contents

		      // Possible processing steps for a payment include the following:

		      // Check that the payment_status is Completed
		      // Check that txn_id has not been previously processed
		      // Check that receiver_email is your Primary PayPal email
		      // Check that payment_amount/payment_currency are correct
	     	  // Process payment

	    } 
	    else if (strcmp ($res, "INVALID") == 0) { 

	    	//Response contains INVALID - reject notification

	      // Authentication protocol is complete - begin error handling

	      // Send an email announcing the IPN message is INVALID
	      $mail_From    = "IPN@quinexinves.com";
	      $mail_To      = "sammkaranja@gmail.com";
	      $mail_Subject = "INVALID IPN";
	      $mail_Body    = $req;

	      mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
	    }
	    else{
	    	$mail_From    = "IPN@quinexinves.com";
		      $mail_To      = "sammkaranja@gmail.com";
		      $mail_Subject = "NO RESPONSE FROM IPN";
		      $mail_Body    = 'Respose res = '.$res ;

		      mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
	    }}
	  	  fclose($fp);  // Close the file
		 }



			/*$req = 'cmd=_notify-validate';
			
			
			$header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
			$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$header .= "Host:www.sandbox.paypal.com \r\n";  // www.sandbox.paypal.com for a test site
			$header .= "Content-Length: " . strlen($req) . "\r\n";
			$header .= "Connection: close\r\n\r\n";
			
			$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
			
			if (!$fp) {
			// HTTP ERROR Failed to connect
			 log_message('error', 'Paypal IPN - HTTP ERROR: '.$errstr);
			}
			else
			{
			  fputs($fp, $header . $req);
			  while (!feof($fp)) {
			    $res = fgets ($fp, 1024);
			    if (stripos($res, "VERIFIED") !== false) {
					log_message('error', 'Paypal IPN - VERIFIED');
					$subscription_id = trim($_POST['custom']);
					$payer_name = $_POST['first_name'].' '.$_POST['last_name'];
					$payer_email = $_POST['payer_email'];
					$payment_status = $_POST['payment_status'];
					$paypal_transaction_id = $_POST['paypal_transaction_id'];
					$subscription = Subscription::find($subscription_id);

					$subscription_details = array('payer_name'=>$payer_name, 
						'payer_email'=>$payer_email, 
						'payment_status'=>$payment_status,
						'paypal_transaction_id'=>$paypal_transaction_id
						);
					$subscription->update_attributes($subscription_details);

					$str = '';
					foreach ($_POST as $key => $value) {
						$value = urlencode(stripslashes($value));
						$req .= "&$key=$value";
						$str.=$key.'='.$value.';';
					}

					$fp = fopen('assets/paypal.log', 'a+');
						fwrite($fp, $str."\n"); 
					fclose($fp);

			    }
			    else if (stripos ($res, "INVALID") !== false) {
			      log_message('error', 'Paypal IPN - Error: Invoice  We have had an INVALID response. \n\nThe transaction ID number is: $txn_id \n\n username = $username');
			    }
			  } //end of while
			fclose ($fp);
			}
	}*/
}