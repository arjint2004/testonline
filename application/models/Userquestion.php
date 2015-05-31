<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserQuestion extends ActiveRecord\Model{
	
	public $belongs_to = array('user');
}