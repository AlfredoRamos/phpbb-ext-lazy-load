<?php

/**
 * Lazy Load extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@proton.me>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

namespace alfredoramos\lazyload\tests\functional;

/**
 * @group functional
 */
class lazyload_test extends \phpbb_functional_test_case
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
			'body' => '[img]https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg[/img]'.PHP_EOL.
			'[img]https://images.pexels.com/photos/1677344/pexels-photo-1677344.jpeg[/img]'
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

		$expected = '<img class="postimage lazyload" alt="Image" data-src="https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg"><br>'.PHP_EOL.
			'<img class="postimage lazyload" alt="Image" data-src="https://images.pexels.com/photos/1677344/pexels-photo-1677344.jpeg">';

		$this->assertSame(2, $elements->count());
		$this->assertSame($expected, $result->html());

		$this->assertSame(
			'https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg',
			$elements->eq(0)->attr('data-src')
		);
		$this->assertTrue(is_null($elements->eq(0)->attr('src')));

		$this->assertSame(
			'https://images.pexels.com/photos/1677344/pexels-photo-1677344.jpeg',
			$elements->eq(1)->attr('data-src')
		);
		$this->assertTrue(is_null($elements->eq(1)->attr('src')));
	}
}
