<?php

/**
 * Lazy Load extension for phpBB.
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
	'ACP_LAZY_LOAD' => 'Lazy Load',

	'ACP_LAZY_LOAD_IMAGE' => 'Image',
	'ACP_LAZY_LOAD_IMAGE_EXPLAIN' => 'Lazy load all <code>&lt;img&gt;</code> tags within posts.',
	'ACP_LAZY_LOAD_IFRAME' => 'Iframe',
	'ACP_LAZY_LOAD_IFRAME_EXPLAIN' => 'Lazy load all <code>&lt;iframe&gt;</code> tags within posts.',

	'LOG_LAZY_LOAD_DATA' => '<strong>Lazy Load data changed</strong><br />» %s'
]);
