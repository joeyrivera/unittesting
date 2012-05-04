<?php
class App_Model_Entity
{
	public function __construct($options = null)
	{
	    if(!is_null($options) && !is_array($options))
	    {
	        throw new InvalidArgumentException('Invalid parameter type passed to construction.');
	    }
	    
		if(is_array($options))
		{
			$this->setOptions($options);
		}
	}
	
	public function __set($key, $value)
	{
	    if(!array_key_exists($key, $this->_data))
	    {
	        throw new InvalidArgumentException("Key {$key} is not valid for " . get_called_class());
	    }
	    
	    $this->_data[$key] = $value;
	}
	
	public function __get($key)
	{
	    if(!array_key_exists($key, $this->_data))
	    {
	        throw new InvalidArgumentException("Key {$key} is not valid for " . get_called_class());
	    }
	    
	    return $this->_data[$key];
	}
	
	public function setOptions($options)
	{
		if(!is_null($options) && !is_array($options))
	    {
	        throw new InvalidArgumentException('Invalid parameter type passed to construction.');
	    }
	    
		foreach($options as $key => $value)
		{
			if(!array_key_exists($key, $this->_data))
			{
				throw new InvalidArgumentException("Key {$key} not found for " . get_called_class() . ".", -32602);
			}
			
			$this->_data[$key] = $value;
		}
	}
	
	public function toArray()
	{
		return $this->_data;
	}
}