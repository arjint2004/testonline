<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends ActiveRecord\Model{

	static $has_many = array(array('answer'));

	static $belongs_to = array(array('exam'));

	public function before_destroy()
    {
        $related_answers = Answer::find(array(
            'conditions' => array(
            'question_id' => $this->id)
        ));

        if($related_answers)
        $related_answers->delete();

    	if($this->image != '')
    		unlink($this->image);
    }

}