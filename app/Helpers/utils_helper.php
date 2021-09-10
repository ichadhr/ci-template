<?php

/**
 *
 * Helper for sidebar menu
 *
 */

if (!function_exists('menuBase')) {
	/**
	 * enable Base menu sidebar
	 *
	 * @param string $URI
	 * @return void
	 */
	function menuBase() : void
	{
		$currentPage = $_SERVER['REQUEST_URI'];

		if (base_url() === $currentPage) {
			echo 'class="active"';
		}
	}
}

if (!function_exists('menuActive')) {
	/**
	 * enable active menu sidebar
	 *
	 * @param string $URI
	 * @return void
	 */
	function menuActive(string $URI) : void
	{
		$validURI = basename(htmlspecialchars($_SERVER['REQUEST_URI']));

		if ($validURI === $URI) {
			echo 'class="active"';
		}
	}
}

if (!function_exists('menu2Active')) {
	/**
	 * enable active menus level 2 sidebar
	 *
	 * @param string $URI
	 * @return void
	 */
	function menu2Active(string $URI) : void
	{
		$tmp1 = basename(dirname(htmlspecialchars($_SERVER['REQUEST_URI'])));
		$tmp2 = basename(htmlspecialchars($_SERVER['REQUEST_URI']));

		$validURI = $tmp1 . '/' . $tmp2;

		if ($validURI == $URI) {
			echo 'class="active"';
		}
	}
}

/**
 *
 * Delimiter helper
 *
 */
if (!function_exists('successDelimiter')) {
	/**
	 * successDelimiter function
	 *
	 * @param string $message
	 * @return string
	 */
	function successDelimiter(string $message) : string
	{
		return config('SiteConfig')->successStartDelimiter . strip_tags($message) . config('SiteConfig')->endDelimiter;
	}
}

if (!function_exists('infoDelimiter')) {
	/**
	 * infoDelimiter function
	 *
	 * @param string $message
	 * @return string
	 */
	function infoDelimiter(string $message) : string
	{
		return config('SiteConfig')->infoStartDelimiter . strip_tags($message) . config('SiteConfig')->endDelimiter;
	}
}

if (!function_exists('errorDelimiter')) {
	/**
	 * errorDelimiter function
	 *
	 * @param string $message
	 * @return string
	 */
	function errorDelimiter(string $message) : string
	{
		return config('SiteConfig')->errorStartDelimiter . strip_tags($message) . config('SiteConfig')->endDelimiter;
	}
}

/**
 *
 * Utils helper
 *
 */
