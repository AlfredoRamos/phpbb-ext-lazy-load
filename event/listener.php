<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/**
	 * Assign functions defined in this class to event listeners in the core.
	 *
	 * @return array
	 */
	static public function getSubscribedEvents()
	{
		return [
			'core.text_formatter_s9e_configure_after' => ['lazy_load', -1]
		];
	}

	public function lazy_load($event)
	{
		$img = $event['configurator']->tags['img'];
		$dom = $img->template->asDOM();
		$xpath = new \DOMXPath($dom);

		foreach ($xpath->query('//img[@src]') as $node)
		{
			// Get image URL
			$url = trim($node->getAttribute('src'));

			// Check if source URL is empty
			if (empty($url))
			{
				continue;
			}

			// Replace original source
			$node->setAttribute('data-src', $url);

			// Remove original source
			$node->removeAttribute('src');

			// Append CSS class
			$node->setAttribute('class', trim(sprintf(
				'%s lazyload',
				$node->getAttribute('class')
			)));
		}

		$dom->saveChanges();
	}
}
