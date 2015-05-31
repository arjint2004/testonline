<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends ActiveRecord\Model{

	static $has_many = array(array('subscriptions'),
							 array('userexams'),
							 array('userquestions'),
                             array('usergroups'),
		);

   // static $has_many = array(array('groups'));

	public function before_destroy()
    {
        $subscriptions = Subscription::find(array(
            'conditions' => array(
                'user_id' => $this->id)
        ));
        
        if($subscriptions)
        $subscriptions->delete();

    	$exams = UserExam::find(array(
            'conditions' => array(
                'user_id' => $this->id)
        ));
        
        if($exams)
        $exams->delete();

    	$questions = UserQuestion::find(array(
            'conditions' => array(
              'user_id' => $this->id)
        ));
        
        if($questions)
        $questions->delete();

        $usergroup = UserGroup::find(array(
            'conditions' => array(
            'user_id' => $this->id)
        ));
        
        if($usergroup)
        $usergroup->delete();
    }
}