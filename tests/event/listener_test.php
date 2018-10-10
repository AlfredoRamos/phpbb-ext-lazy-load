<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyloading\tests\event;

use phpbb_test_case;
use alfredoramos\lazyloading\event\listener;
use alfredoramos\lazyloading\includes\helper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @group event
 */
class listener_test extends phpbb_test_case
{

	/** @var \alfredoramos\lazyloading\includes\helper */
	protected $helper;

	public function setUp()
	{
		parent::setUp();

		$this->helper = $this->getMockBuilder(helper::class)
			->disableOriginalConstructor()->getMock();
	}

	public function test_instance()
	{
		$this->assertInstanceOf(
			EventSubscriberInterface::class,
			new listener($this->helper)
		);
	}

	public function test_suscribed_events()
	{
		$this->assertSame(
			['core.text_formatter_s9e_render_after'],
			array_keys(listener::getSubscribedEvents())
		);
	}

}
