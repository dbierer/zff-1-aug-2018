<?php
namespace Market;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'market' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/market',
                    'defaults' => [
                        'controller' => 'market-index-controller',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'post' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/post[/]',
                            'defaults' => [
                                'controller' => Controller\PostController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                    'view' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/view[/]',
                            'defaults' => [
                                'controller' => Controller\ViewController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                ],
            ],
		],
	],
    'controllers' => [
        'factories' => [
            'market-index-controller' => Controller\Factory\IndexControllerFactory::class,
            Controller\PostController::class => Controller\Factory\PostControllerFactory::class,
            Controller\ViewController::class => Controller\Factory\ViewControllerFactory::class,
        ],
    ],
    'view_manager' => [
		'template_map' => include __DIR__ . '/../template_map.php',
        //'template_path_stack' => [__DIR__ . '/../view'],
    ],
];
