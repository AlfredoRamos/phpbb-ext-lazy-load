<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\tests\functional;

use phpbb_functional_test_case;

/**
 * @group functional
 */
class lazyload_test extends phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return ['alfredoramos/lazyload'];
	}

	public function test_lazy_loaded_image()
	{
		$this->login();

		$data = [
			'title' => 'Lazy Load Functional Test 1',
			'body' => '[img]https://help.duckduckgo.com/duckduckgo-help-pages/images/fb5a7e58b23313e8c852b2f9ec6a2f6a.png[/img]'.PHP_EOL.
			'[img]https://help.duckduckgo.com/duckduckgo-help-pages/images/2291e0a7248ef66e60686f161361f03d.png[/img]'
		];

		$post = $this->create_topic(
			2,
			$data['title'],
			$data['body']
		);

		$crawler = self::request('GET', vsprintf(
			'viewtopic.php?t=%d&sid=%s',
			[
				$post['topic_id'],
				$this->sid
			]
		));

		$result = $crawler->filter(sprintf(
			'#post_content%d .content',
			$post['topic_id']
		));

		$elements = $result->filter('.lazyload');

		$expected = '<img class="postimage lazyload" alt="Image" data-src="https://help.duckduckgo.com/duckduckgo-help-pages/images/fb5a7e58b23313e8c852b2f9ec6a2f6a.png"><br><img class="postimage lazyload" alt="Image" data-src="https://help.duckduckgo.com/duckduckgo-help-pages/images/2291e0a7248ef66e60686f161361f03d.png">';

		$this->assertSame(2, $elements->count());
		$this->assertSame($expected, $result->html());

		$this->assertSame(
			'https://help.duckduckgo.com/duckduckgo-help-pages/images/fb5a7e58b23313e8c852b2f9ec6a2f6a.png',
			$elements->eq(0)->attr('data-src')
		);
		$this->assertTrue(is_null($elements->eq(0)->attr('src')));

		$this->assertSame(
			'https://help.duckduckgo.com/duckduckgo-help-pages/images/2291e0a7248ef66e60686f161361f03d.png',
			$elements->eq(1)->attr('data-src')
		);
		$this->assertTrue(is_null($elements->eq(1)->attr('src')));
	}
}
