<?php
// function to check if the system has been installed
function check_installer(){
	$CI = & get_instance();
	$CI->load->database();
	$CI->load->dbutil();
		if ($CI->db->database == "") {
			redirect('install');
		} else {
			if (!$CI->dbutil->database_exists($CI->db->database))
			{
				redirect('install/index.php?e=db');

			}else if (is_dir('install')) {
				redirect('install/index.php?e=folder');
			}
		}
}
function date_format_select($selected = ''){
	$formats = array('d/m/Y' => date('d/m/Y'),
					 'm/d/Y' => date('m/d/Y'),
					 'Y/m/d' => date('Y/m/d'),
					 'F j, Y' => date('F j, Y'),
					 'm.d.y' => date('m.d.Y'),
					 'd-m-Y' => date('d-m-Y'),
					 'D M j Y' => date('D M j Y'),
			
	);
	$select = form_dropdown('date_format', $formats, $selected,  'class="form-control" name="date_format"');
	return $select;
}
function success_msg($msg){
	$display = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Success! </b> ' .$msg. '
                </div>';
	return $display;
}

function error_msg($msg){
	$display = '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Error! </b> ' .$msg. '
                </div>';
	return $display;
}
function delete_btn($link = ''){
	ob_start(); ?>
	<a class="btn btn-danger btn-sm btn_delete" rel="popover" data-placement="left" data-content="<a class='btn btn-danger btn-delete' href='<?php echo site_url($link);  ?>'>
	Yes I'm sure</a> <button class='btn btn-close'>No</button>" data-original-title="<b>Are you sure?</b>" ><i class="fa fa-trash-o"></i> Delete</a>              
	<?php  $display = ob_get_clean (); 				
	return $display;
}

function activate_btn($link = ''){
	$display = '<a href="'.site_url($link).'" class="btn btn-info btn-sm"><i class="fa fa-tick"></i> Activate</a>';			
	return $display;
}

function deactivate_btn($link = ''){
	$display = '<a href="'.site_url($link).'" class="btn btn-warning btn-sm toggle-modal"><i class="fa fa-times"></i> Deactivate</a>';		 				
	return $display;
}

function edit_btn($link = ''){
	$display = '<a href="'.site_url($link).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>';
	return $display;
}
function share_btn($link = ''){
	$display = '<a href="'.site_url($link).'" class="btn btn-primary btn-sm toggle-modal"><i class="fa fa-share-alt"></i> Share</a>';
	return $display;
}
function view_btn($link = ''){
	$display = '<a href="'.site_url($link).'" class="btn btn-primary btn-sm toggle-modal"><i class="fa fa-eye"></i> View</a>';
	return $display;
}
function format_date($date = ''){
	$CI = & get_instance();
	$settings = Setting::first();
	$formated_date = date($settings->date_format, strtotime($date));
	return $formated_date;
}
function exam_status($status){
	if($status == '1') : 
		$label = '<span class="label label-success"> Active </span>';
	elseif ($status == '0') : 
		$label = '<span class="label label-danger"> Inactive </span>';
	endif;
	return $label;
}

function status_label($status){
	if($status == '1') : 
		$label = '<span class="label label-success"> Active </span>';
	elseif ($status == '0') : 
		$label = '<span class="label label-danger"> Inactive </span>';
	endif;
	return $label;
}
function payment_status_label($status){
	if($status == 'Completed') : 
		$label = '<span class="label label-success"> '.ucwords($status).' </span>';
	elseif ($status == 'Pending') : 
		$label = '<span class="label label-danger">'.ucwords($status).' </span>';
	endif;
	return $label;
}
function format_amount($amount = 0){
	$CI =& get_instance();
	$settings = Setting::first();
	$currency = (isset($settings->currency)) ? $settings->currency : '';
	$formatted_amt = number_format($amount, 2);

	$formatted_amt = (isset($currency)) ? $currency.' '.$formatted_amt : $formatted_amt;
	return $formatted_amt;
}
function timeDiff($starttime, $endtime)
{
    $timespent = strtotime( $endtime)-strtotime($starttime);
    $days = floor($timespent / (60 * 60 * 24)); 
    $remainder = $timespent % (60 * 60 * 24);
    $hours = floor($remainder / (60 * 60));
    $remainder = $remainder % (60 * 60);
    $minutes = floor($remainder / 60);
    $seconds = $remainder % 60;
    $TimeInterval = '';
    if($hours < 0) $hours=0;
    if($hours != 0)
    {
        $TimeInterval = ($hours == 1) ? $hours.' hour' : $hours.' hours';
    }
    if($minutes < 0) $minutes=0;
    if($seconds < 0) $seconds=0;
    $TimeInterval = $minutes.' minutes '. $seconds.' seconds ';
    
    return $TimeInterval;
}

function limit_text($string = '', $limit = 80) 
{
	if (strlen($string) >= $limit)
	return substr($string, 0, $limit-1)." ..."; // This is a test...
	else
	return $string;
}