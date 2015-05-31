<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends ActiveRecord\Model{

	static $has_many = array(
            array('question'),
            array('users', 'through' => 'userexam'),
        );

	static $belongs_to = array(array('category'));
}