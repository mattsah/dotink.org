<?php

use IW\HTTP;
use Dotink\Flourish;
use Inkwell\Controller\BaseController;
use Inkwell\View;

use cebe\markdown\GithubMarkdown as Markdown;

/**
 *
 */
class BlogController extends BaseController
{
	/**
	 *
	 */
	public function __construct(View $view, BlogArticleRepository $repository)
	{
		$this->view       = $view;
		$this->repository = $repository;
	}


	/**
	 *
	 */
	public function select(Markdown $markdown)
	{
		$title   = $this->request->params->get('title');
		$article = $this->repository->load($title);

		return $this->view->load('blog/article.html', [
			'article'  => $article,
			'markdown' => $markdown
		]);
	}
}
