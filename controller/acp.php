<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\controller;

use phpbb\config\config;
use phpbb\template\template;
use phpbb\request\request;
use phpbb\language\language;
use phpbb\user;
use phpbb\log\log;

class acp
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\log\log */
	protected $log;

	/**
	 * Controller constructor.
	 *
	 * @param \phpbb\config\config		$config
	 * @param \phpbb\template\template	$template
	 * @param \phpbb\request\request	$request
	 * @param \phpbb\language\language	$language
	 * @param \phpbb\user				$user
	 *
	 * @return void
	 */
	public function __construct(config $config, template $template, request $request, language $language, user $user, log $log)
	{
		$this->config = $config;
		$this->template = $template;
		$this->request = $request;
		$this->language = $language;
		$this->user = $user;
		$this->log = $log;
	}

	/**
	 * Settings mode page.
	 *
	 * @param string $u_action
	 *
	 * @return void
	 */
	public function settings_mode($u_action = '')
	{
		if (empty($u_action))
		{
			return;
		}

		// Elements to lazy load
		$elements = [
			'image' => (int) $this->config['lazy_load_image'],
			'iframe' => (int) $this->config['lazy_load_iframe']
		];

		// Request form data
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('alfredoramos_lazyload'))
			{
				trigger_error(
					$this->language->lang('FORM_INVALID') .
					adm_back_link($u_action),
					E_USER_WARNING
				);
			}

			// Data helper
			$data = [
				'image' => $this->request->variable('lazy_load_image', 1),
				'iframe' => $this->request->variable('lazy_load_iframe', 1)
			];

			foreach ($data as $key => $value)
			{
				$value = ($value < 0) ? 0 : $value;
				$value = ($value > 1) ? 1 : $value;

				$this->config->set(
					sprintf('lazy_load_%s', $key),
					$value
				);
			}

			// Admin log
			$this->log->add(
				'admin',
				$this->user->data['user_id'],
				$this->user->ip,
				'LOG_LAZY_LOAD_DATA',
				false,
				[$this->language->lang('SETTINGS')]
			);

			// Confirm dialog
			trigger_error(
				$this->language->lang('CONFIG_UPDATED') .
				adm_back_link($u_action)
			);
		}

		// Assign lazy load elements
		foreach ($elements as $key => $value)
		{
			$this->template->assign_block_vars('LAZY_LOAD_ELEMENTS', [
				'KEY' => sprintf('lazy_load_%s', $key),
				'VALUE' => $value,
				'NAME' => $this->language->lang(
					sprintf('ACP_LAZY_LOAD_%s', strtoupper($key))
				),
				'EXPLAIN' => $this->language->lang(
					sprintf('ACP_LAZY_LOAD_%s_EXPLAIN', strtoupper($key))
				),
				'ENABLED' => ($value === 1)
			]);
		}
	}
}
