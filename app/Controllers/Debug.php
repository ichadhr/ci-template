<?php

namespace App\Controllers;


class Debug extends BaseController
{

	protected array $data = [];

	/**
     * @psalm-suppress UndefinedMethod
     */
	public function index() : string
	{
		$this->data['home'] = "home";
		return $this->_renderPage('welcome_message', $this->data);
	}
}
