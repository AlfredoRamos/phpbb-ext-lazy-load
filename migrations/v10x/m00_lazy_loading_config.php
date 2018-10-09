<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyloading\migrations\v10x;

use phpbb\db\migration\migration;

class m00_lazy_loading_config extends migration
{

	public function update_data()
	{
		return [
			[
				'config.add',
				['lazy_load_images', 1]
			]
		];
	}

}
