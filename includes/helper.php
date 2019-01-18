<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\includes;

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

		// Elements to lazy load
		$elements = [
			'image' => '//img[@class="postimage"]',
			'iframe' => '//iframe'
		];

		foreach ($elements as $key => $value)
		{
			// Check if is enabled
			if ((int) $this->config[sprintf('lazy_load_%s', $key)] !== 1)
			{
				continue;
			}

			// Manipulate HTML markup
			foreach ($xpath->query($value) as $node)
			{
				// Check if source URL is empty
				$url = trim($node->getAttribute('src'));

				if (empty($url))
				{
					continue;
				}

				// Replace original source
				$node->setAttribute('data-src', $url);

				// Remove original source
				$node->removeAttribute('src');

				// Append CSS class
				$class = trim($node->getAttribute('class'));
				$class = empty($class) ? 'lazyload' : sprintf('lazyload %s', $class);
				$node->setAttribute('class', $class);
			}
		}

		// Save changes
		$html = $dom->saveHTML();

		return $html;
	}
}
