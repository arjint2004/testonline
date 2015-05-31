<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserExam extends ActiveRecord\Model{

	static $belongs_to = array(
						            array('user'),
						            array('exam')
					        	);
}