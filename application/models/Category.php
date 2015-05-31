<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends ActiveRecord\Model{
	
	static $has_many = array(array('exam'));

	public function before_destroy()
    {
        $related_exams = Exam::find(array(
            'conditions' => array(
                'category_id' => $this->id)
        ));
        
        if($related_exams)
        $related_exams->delete();
    }

	static $validates_presence_of = array(
     	array('name')
	);
}
