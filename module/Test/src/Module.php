<?php
namespace Test;

use Test\Controller\TestController;
use Zend\Mvc\MvcEvent;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Factory\InvokableFactory;

class Module
{
	public function onBootstrap(MvcEvent $e)
	{
		$em = $e->getApplication()->getEventManager();
		$shared = $em->getSharedManager();
		$shared->attach(
			'*',
			'WHATEVER', 
			function ($e) { 
				echo '<pre>';
				echo __CLASS__ . PHP_EOL;
				echo 'Event Name: ' . $e->getName() . PHP_EOL;
				echo 'Event Target: ' . get_class($e->getTarget()) . PHP_EOL;
				echo 'Event Params: ' . var_export($e->getParams(), TRUE);
				echo '</pre>';
			}
		);
	}
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
				'test-adapter-config' => [
					'driver' => 'PDO',
					'dsn' => 'mysql:hostname=localhost;dbname=onlinemarket',
					'username' => 'vagrant',
					'password' => 'vagrant',
				],
			],
			'factories' => [
				'test-adapter' => function ($container) {
					return new Adapter($container->get('test-adapter-config'));
				},
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
					$controller->setAdapter($container->get('test-adapter'));
					return $controller;
				},
			],
		];
	}
}
