<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
protected function _initAutoload()
	{
		Zend_Loader_Autoloader::getInstance()->registerNamespace('App');
	}


}

