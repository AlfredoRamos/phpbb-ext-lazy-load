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

		foreach ($this->lazy_elements() as $key => $value)
		{
			if ($value['enabled'] !== true)
			{
				continue;
			}

			$html = preg_replace(
				$value['pattern'],
				$value['replacement'],
				$html
			);
		}

		return $html;
	}

	private function lazy_elements()
	{
		return [
			'img' => [
				'enabled' => ((int) $this->config['lazy_load_images'] === 1),
				'pattern' => '#<img src="(.*?)" class="postimage" alt="(.*?)">#i',
				'replacement' => '<img data-src="$1" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="postimage b-lazy" alt="$2">'
			]
		];
	}

}
