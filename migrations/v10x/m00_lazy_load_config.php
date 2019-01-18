<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\migrations\v10x;

use phpbb\db\migration\migration;

class m00_lazy_load_config extends migration
{
	public function update_data()
	{
		return [
			[
				'config.add',
				['lazy_load_image', 1],
			],
			[
				'config.add',
				['lazy_load_iframe', 1],
			]
		];
	}
}
