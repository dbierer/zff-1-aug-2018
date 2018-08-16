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
    public function getServiceConfig()
    {
		return [
			'services' => [
				'test-service-1' => [
					__FILE__
				],
				'test-service-2' => __FILE__,
			],
		];
	}
    public function getControllerConfig()
    {
		return [
			'factories' => [
				Controller\IndexController::class => InvokableFactory::class,
				Controller\TestController::class => function ($container) {
					$controller = new TestController();
					$controller->setTestService1($container->get('test-service-1'));
					$controller->setTestService2($container->get('test-service-2'));
					return $controller;
				},
			],
		];
	}
}
