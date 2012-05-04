<?php

class App_Model_UserTest extends App_Model_AbstractTest
{
    protected $_model_name = 'App_Model_User';
    
    public function testUppercaseFirstName()
    {
    	$this->_entity->first_name = 'joey';
    	$this->assertEquals('Joey', $this->_entity->first_name);
    }
    
 	public function testUppercaseLastName()
    {
    	$this->_entity->last_name = 'rivera';
    	$this->assertEquals('Rivera', $this->_entity->last_name);
    }
}

