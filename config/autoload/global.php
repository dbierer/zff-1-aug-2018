<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'service_manager' => [
		'services' => [
			'test-service-1' => [
				__FILE__
			],
			'test-service-2' => __FILE__,
            'categories' => [
				'barter',
				'beauty',
				'clothing',
				'computer',
				'entertainment',
				'free',
				'garden',
				'general',
				'health',
				'household',
				'phones',
				'property',
				'sporting',
				'tools',
				'transportation',
				'wanted',
            ],
			'expire-days' => [
					0  => 'Never',
					1  => 'Tomorrow',
					7  => 'Week',
					30 => 'Month',
			],
			'expire-days-intervals' => [
					0  => 'P99Y',
					1  => 'P1D',
					7  => 'P1W',
					30 => 'P1M',
					'default' => 'P99Y',
			],
			'captcha-options' => [
				'expiration' => 300,
				'font'      => __DIR__ . '/../../public/fonts/FreeSansBold.ttf',
				'fontSize'  => 24,
				'height'    => 50,
				'width'     => 200,
				'imgDir'    => __DIR__ . '/../../public/captcha',
				'imgUrl'    => '/captcha',
			],
		],
    ],
];
