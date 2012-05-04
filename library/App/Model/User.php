<?php
class App_Model_User extends App_Model_Entity
{
	protected $_data = array(
		'user_id' => 0,
		'first_name' => null,
		'last_name' => null,
	);
	
	public function __get($key)
	{
		if($key == 'first_name')
		{
			return ucwords($this->_data[$key]);
		}
		
		return parent::__get($key);
	}
}