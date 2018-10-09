<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyloading\acp;

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
			'filename'	=> '\alfredoramos\lazyloading\acp\main_module',
			'title'		=> 'ACP_LAZY_LOADING',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'SETTINGS',
					'auth'	=> 'ext_alfredoramos/lazyloading && acl_a_board',
					'cat'	=> ['ACP_LAZY_LOADING']
				]
			]
		];
	}

}
