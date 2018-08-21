<?php
namespace GlobalEvents;

use Zend\EventManager\EventManager;

class Manager
{
	protected static $manager;
	public static function getInstance()
	{
		if (!self::$manager) {
			self::$manager = new EventManager();
		}
		return self::$manager;
	}
}

						
