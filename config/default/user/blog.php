<?php

	use IW\HTTP;

	return Affinity\Config::create(['providers', 'routes'], [

		//
		// Global routing configuration
		//

		'@routes' => [

			//
			// The base URL for all configured anchors, handlers, and redirects in this
			// context
			//

			'base_url' => '/blog',

			//
			//
			//

			'links' => [
				'/'          => 'BlogController::index',
				'/[*:title]' => 'BlogController::select'
			],

		]
	]);
