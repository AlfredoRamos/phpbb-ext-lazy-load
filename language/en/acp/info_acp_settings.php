<?php

/**
 * Lazy Loading extension for phpBB.
 * @author Alfredo Ramos <alfredo.ramos@yandex.com>
 * @copyright 2018 Alfredo Ramos
 * @license GPL-2.0-only
 */

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
 * @ignore
 */
if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'ACP_LAZY_LOADING' => 'Lazy Loading',

	'ACP_LAZY_LOAD_IMAGES' => 'Images',
	'ACP_LAZY_LOAD_VIDEOS' => 'Videos',
	'ACP_LAZY_LOAD_IFRAMES' => 'Iframes',

	'LOG_LAZY_LOADING_DATA' => '<strong>Lazy Load data changed</strong><br />» %s'
]);
