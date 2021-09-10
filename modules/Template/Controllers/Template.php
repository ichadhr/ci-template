<?php
/**
 * Modules template controllers
 */

namespace Modules\Template\Controllers;

use App\Controllers\BaseController;

class Template extends BaseController
{
	public function index()
	{
		$this->viewData['title']     = 'Template';
		$this->viewData['titleIcon'] = config('SiteConfig')->iconDashboard;
		return $this->_renderPage('\Modules\Template\Views\index', $this->viewData);
	}
}
