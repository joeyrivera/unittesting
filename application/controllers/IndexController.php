<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$user = new App_Model_User();
		$user->user_id = 1;
		$user->first_name = 'joey';
		$user->last_name = 'rivera';
		
		$this->view->user = $user;
    }


}

