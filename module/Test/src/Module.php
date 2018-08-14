<?php
namespace Test;

use Test\Controller\TestController;
use Zend\ServiceManager\Factory\InvokableFactory;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getControllerConfig()
    {
		return [
			'factories' => [
				Controller\IndexController::class => InvokableFactory::class,
				Controller\TestController::class => function ($container) {
					$controller = new TestController();
					return $controller;
				},
			],
		];
	}
}
