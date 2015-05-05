<?php namespace Inkwell\HTML; ?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<?php html::per($this->assets->styles, function($i, $style) { ?>
			<link href="<?= $style ?>" rel="stylesheet" type="text/css" />
		<?php }) ?>

		<link href="http://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css" />
		<link href="/styles/theme.css" rel="stylesheet" type="text/css" />

		<title><?= $this('title') ?: 'Welcome to inKWell' ?></title>
	</head>
	<body>
		<?php $this->inject("header.html") ?>
		<?php $this->insert("content") ?>
		<?php $this->inject("footer.html") ?>

		<?php html::per($this->assets->scripts, function($i, $script) { ?>
			<script src="<?= $script ?>" type="text/javascript"></script>
		<?php }) ?>

	</body>
</html>
