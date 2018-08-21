<?php
namespace GlobalEvents;

use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\EventManager\EventManager;

class Module
{
	public function onBootstrap(MvcEvent $e)
	{
		$manager = Manager::getInstance();
		$manager->attach('XYZ', function ($e) { 
			echo '<pre>';
			echo 'Event Name: ' . $e->getName() . PHP_EOL;
			echo 'Event Target: ' . get_class($e->getTarget()) . PHP_EOL;
			echo 'Event Params: ' . var_export($e->getParams(), TRUE);
			echo '</pre>';
		});
	}
}

						
