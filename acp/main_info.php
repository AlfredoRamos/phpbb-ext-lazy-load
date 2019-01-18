<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\acp;

class main_info
{
	/**
	 * Set up ACP module.
	 *
	 * @return array
	 */
	public function module()
	{
		return [
			'filename'	=> '\alfredoramos\lazyload\acp\main_module',
			'title'		=> 'ACP_LAZY_LOAD',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'SETTINGS',
					'auth'	=> 'ext_alfredoramos/lazyload && acl_a_board',
					'cat'	=> ['ACP_LAZY_LOAD']
				]
			]
		];
	}
}
