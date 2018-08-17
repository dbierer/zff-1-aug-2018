<?php
namespace Market\Controller\Factory;

use Market\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
		// NOTE: if using ZF 2.4, you would first need to retrieve the ServiceManager from the container
		// $serviceManager = $container->getServiceManager();
		// then you can get any service manager services:
		// $serviceManager->get('categories');
        $controller = new IndexController();
        $controller->setCategories($container->get('categories'));
        return $controller;
    }
}
