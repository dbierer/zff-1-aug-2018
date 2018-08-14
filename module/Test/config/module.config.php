<?php
namespace Test;

use Zend\Router\Http\ {Literal,Segment};
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'test' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/test',
                    'defaults' => [
                        'controller' => Controller\TestController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'main' => [
                        'type' => Segment::class,
                        'options' => [
							'route'    => '/main[/:action]',
							'defaults' => [
								'controller' => Controller\IndexController::class,
								'action'     => 'index',
							],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            Controller\Plugin\Whatever::class => InvokableFactory::class,
        ],
        'aliases' => [
			'whatever' => Controller\Plugin\Whatever::class,
		],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
