<?php

abstract class App_Model_AbstractTest extends PHPUnit_Framework_TestCase
{
	protected $_entity;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp()
	{
		$this->_entity = new $this->_model_name();
		parent::setUp();
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown()
	{
		$this->_entity = null;
		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct()
	{
		
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testConstructorException()
	{
		new $this->_model_name(123);
	}
	
	public function testContructor()
	{
	    $data = $this->_entity->toArray();
	    $keys = array_keys($data);
	    $first_key_name = $keys[0];
	    
	    $options = array($first_key_name => 123);
	    $new_object = new $this->_model_name($options);
	    $this->assertEquals($new_object->{$first_key_name}, 123);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetOptionsException()
	{
		$item = new $this->_model_name();
		$item->setOptions(123);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testInvalidKey()
	{
		$key = 'Invalid_Key_Here';
		$this->assertArrayNotHasKey($key, $this->_entity->toArray());
		$this->setExpectedException('Exception');
		$this->_entity->$key;
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testGetException()
	{
	    $this->_entity->random_key;
	}
	
	public function testGet()
	{
	    $data = $this->_entity->toArray();
	    $keys = array_keys($data);
	    $first_key_name = $keys[0];
	    $this->assertEquals($this->_entity->{$first_key_name}, $data[$first_key_name]);
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetException()
	{
	    $this->_entity->random_key = 'randomness';
	}
	
	public function testSet()
	{
	    $data = $this->_entity->toArray();
	    $keys = array_keys($data);
	    $first_key_name = $keys[0];
	    $this->_entity->{$first_key_name} = 123;
	    
	    $new_data = $this->_entity->toArray();
	    $this->assertNotEquals($data[$first_key_name], $new_data[$first_key_name]);
	}
}