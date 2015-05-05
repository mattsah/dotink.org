<?php namespace Inkwell\HTML;

	$this->expand('main', 'layouts/full.html');

	$this['title']           = $this['article']->title;
	$this->assets->styles[]  = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/solarized_light.min.css';
	$this->assets->scripts[] = '//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js';
	$this->assets->scripts[] = '//carnivalapp.io/sites/246/init.js';

	?>

	<section class="main">
		<article>
			<header>
				<h1><?= $this('article.title') ?></h1>
			</header>

			<?= $this['markdown']->parse($this['article.body']) ?>

			<footer>

			</footer>
		</article>
	</section>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			hljs.initHighlightingOnLoad();
			Carnival.init();
		});
	</script>
