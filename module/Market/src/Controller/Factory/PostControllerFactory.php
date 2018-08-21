<?php
namespace Market\Controller\Factory;

use Market\Controller\PostController;
use Market\Form\PostForm;
use Interop\Container\ContainerInterface;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Zend\ServiceManager\Factory\FactoryInterface;

class PostControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new PostController($container->get(PostForm::class));
        return $controller;
    }
}
