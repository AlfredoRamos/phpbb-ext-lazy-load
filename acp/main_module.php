<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyloading\acp;

class main_module
{

	/** @var string */
	public $u_action;

	/** @var string */
	public $tpl_name;

	/** @var string */
	public $page_title;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \alfredoramos\lazyloading\controller\acp */
	protected $acp_controller;

	/**
	 * ACP module constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		global $phpbb_container;

		$this->template = $phpbb_container->get('template');
		$this->language = $phpbb_container->get('language');
		$this->acp_controller = $phpbb_container->get('alfredoramos.lazyloading.acp.controller');
	}

	/**
	 * Main module method.
	 *
	 * @param string $id
	 * @param string $mode
	 *
	 * @return void
	 */
	public function main($id, $mode)
	{
		add_form_key('alfredoramos_lazyloading');

		switch ($mode)
		{
			case 'settings':
				$this->tpl_name = 'acp_lazy_loading_settings';
				$this->page_title = $this->language->lang('ACP_LAZY_LOADING');
				$this->acp_controller->settings_mode($this->u_action);
			break;

			default:
				trigger_error(
					$this->language->lang('NO_MODE') .
					adm_back_link($this->u_action),
					E_USER_WARNING
				);
			break;
		}

		// Assign global template variables
		$this->template->assign_var('U_ACTION', $this->u_action);
	}

}
