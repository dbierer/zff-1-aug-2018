<?php
namespace GlobalEvents

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\EventManager\EventManager;

class Module
{
	public function getServiceConfig()
	{
		return [
			'factories' => [
				'global-events-manager' => function ($container) {
					return new EventManager($container->get('SharedEventManager'));
				},
			],
		];
	}
}

						
