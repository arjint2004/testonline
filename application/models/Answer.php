<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends ActiveRecord\Model{
	
	static $belongs_to = array(array('question'));

}