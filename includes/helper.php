<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyloading\includes;

use phpbb\config\config;

class helper
{
	/** @var \phpbb\config\config */
	protected $config;

	/**
	 * Constructor of the helper class.
	 *
	 * @param \phpbb\config\config $config
	 *
	 * @return void
	 */
	public function __construct(config $config)
	{
		$this->config = $config;
	}

	public function lazy_load($html = '')
	{
		if (empty($html))
		{
			return '';
		}

		$dom = new \DOMDocument;
		$dom->preserveWhiteSpace = false;
		$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		$xpath = new \DOMXPath($dom);

		// Images
		if ((int) $this->config['lazy_load_images'] === 1)
		{
			foreach ($xpath->query('//img[@class="postimage"]') as $node)
			{
				$url = $node->getAttribute('src');

				if (empty($url))
				{
					continue;
				}

				$node->setAttribute('data-src', $url);
				$node->removeAttribute('src');
				$node->setAttribute('class', sprintf(
					'b-lazy %s',
					$node->getAttribute('class')
				));
			}
		}

		// Iframes
		if ((int) $this->config['lazy_load_iframes'] === 1)
		{
			foreach ($xpath->query('//iframe') as $node)
			{
				$url = $node->getAttribute('src');

				if (empty($url))
				{
					continue;
				}

				$node->setAttribute('data-src', $url);
				$node->removeAttribute('src');
				$class = $node->getAttribute('class');
				$class = empty($class) ? 'b-lazy' : sprintf('b-lazy %s', $class);
				$node->setAttribute('class', $class);
			}
		}

		// Save changes
		$html = $dom->saveHTML();

		return $html;
	}
}
