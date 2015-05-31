<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends ActiveRecord\Model{
	
	static $belongs_to = array(
        array('user'),
        array('exam')
    );

	static $validates_presence_of = array(
     	array('exam_id'),
     	array('user_id'),
     	array('amount')
	);
}