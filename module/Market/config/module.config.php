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
                        'module'     => __NAMESPACE__,
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
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/view',
                            'defaults' => [
                                'controller' => Controller\ViewController::class,
                                'action'     => 'index',
                            ],
                        ],
						'may_terminate' => true,
						'child_routes' => [
							'category' => [
								'type' => Segment::class,
								'options' => [
									'route' => '/category[/:category]',
									'defaults' => [
										'controller' => Controller\ViewController::class,
										'action'     => 'index',
									],
								],
							],
							'item' => [
								'type' => Segment::class,
								'options' => [
									'route' => '/item[/:id]',
									'defaults' => [
										'controller' => Controller\ViewController::class,
										'action'     => 'item',
									],
								],
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
    'service_manager' => [
		'factories' => [
			Form\PostForm::class => Form\Factory\PostFormFactory::class,
			Form\PostFilter::class => Form\Factory\PostFilterFactory::class,
		],
    ],
    'view_manager' => [
		//'template_map' => include __DIR__ . '/../template_map.php',
        'template_path_stack' => [__DIR__ . '/../view'],
    ],
];
