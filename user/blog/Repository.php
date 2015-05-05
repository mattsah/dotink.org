<?php namespace Dotink\SoapBox
{

	use Symfony\Component\Yaml\Parser as YamlParser;
	use Symfony\Component\Yaml\Exception\ParseException;
	use Dotink\Flourish;

	class Repository
	{
		const META_SEPARATOR = '---';

		/**
		 *
		 */
		public function __construct($entity_root, YamlParser $yaml_parser)
		{
			$this->entityRoot = $entity_root;
			$this->yamlParser = $yaml_parser;
		}


		/**
		 *
		 */
		public function load($key)
		{
			$entity_path = $this->entityRoot . DIRECTORY_SEPARATOR . $key . '.ent';

			if (!file_exists($entity_path)) {
				throw new Flourish\NotFoundException(
					'Could not load entity at %s', $entity_path
				);
			}

			list($meta, $body) = explode(self::META_SEPARATOR, file_get_contents($entity_path), 2);

			try {
				$entity        = (object) $this->yamlParser->parse(trim($meta));
				$entity->body  = trim($body);
				$entity->error = FALSE;

			} catch (ParseException $e) {
				$entity        = new stdClass();
				$entity->body  = $e->getMessage();
				$entity->error = TRUE;
			}

			$entity->path = $entity_path;

			return $entity;
		}
	}
}
