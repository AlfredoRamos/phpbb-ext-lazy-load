<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyloading\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use alfredoramos\lazyloading\includes\helper;

class listener implements EventSubscriberInterface
{

	/** @var \alfredoramos\lazyloading\includes\helper */
	protected $helper;

	/**
	 * Listener constructor.
	 *
	 * @param \alfredoramos\lazyloading\includes\helper $helper
	 *
	 * @return void
	 */
	public function __construct(helper $helper)
	{
		$this->helper = $helper;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core.
	 *
	 * @return array
	 */
	static public function getSubscribedEvents()
	{
		return [
			'core.text_formatter_s9e_render_after' => 'lazy_load'
		];
	}

	public function lazy_load($event)
	{
		$event['html'] = $this->helper->lazy_load($event['html']);
	}

}