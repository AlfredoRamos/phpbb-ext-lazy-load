<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\migrations\v10x;

use phpbb\db\migration\migration;

class m01_lazy_load_modules extends migration
{

	public function update_data()
	{
		return [
			[
				'module.add',
				[
					'acp',
					'ACP_CAT_DOT_MODS',
					'ACP_LAZY_LOAD'
				]
			],
			[
				'module.add',
				[
					'acp',
					'ACP_LAZY_LOAD',
					[
						'module_basename' => '\alfredoramos\lazyload\acp\main_module',
						'modes'	=> ['settings']
					]
				]
			]
		];
	}

}
