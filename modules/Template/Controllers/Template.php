<?php
/**
 * Modules template controllers
 */
namespace Modules\Template\Controllers;
use App\Controllers\BaseController;


class Template extends BaseController
{
    protected array $data = [];

    public function index()
    {
        $this->data['title'] = "Template";
		return $this->_renderPage('\Modules\Template\Views\index', $this->data);
    }
}