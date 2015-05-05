<?php

	return Affinity\Action::create(['core'], function($app, $broker) {
		$entity_directory = $app['engine']->fetch('user/blog', 'entity_directory', 'user/articles');

		$broker->define('BlogArticleRepository', [
			':entity_root' => $app->getDirectory($entity_directory)
		]);
	});
