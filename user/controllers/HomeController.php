<?php

use IW\HTTP;
use Dotink\Flourish;
use Inkwell\Controller\BaseController;
use Inkwell\View;

/**
 *
 */
class HomeController extends BaseController
{
	/**
	 *
	 */
	public function __construct(View $view)
	{
		$this->view = $view;
	}


	/**
	 * Handles wildcard route to map vies 1-to-1
	 */
	public function defaultAction()
	{
		$request_path = $this->request->getUrl()->getPath();
		$template     = substr($request_path, -1, 1) == '/'
			? $request_path . 'index.html'
			: $request_path . '.html';

		try {
			$this->view->load('static' . $template)->resolve();
			$this->response->set($this->view);

		} catch (Flourish\NotFoundException $e) {
			$this->response->setStatus(HTTP\NOT_FOUND);
		}

		return $this->response;
	}
}
