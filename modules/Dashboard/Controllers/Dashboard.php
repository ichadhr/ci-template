<?php
/**
 * Modules dashboard controllers
 */
namespace Modules\Dashboard\Controllers;
use App\Controllers\BaseController;


class Dashboard extends BaseController
{
    protected array $data = [];

    public function index()
    {
        if (!$this->ionAuth->loggedIn())
		{
			// redirect them to the login page
			return redirect()->to('login');
		}
        else
        {
            $this->data['title'] = lang('Interface.menu.sidebar.dashboard');
		return $this->_renderPage('\Modules\Dashboard\Views\index', $this->data);
        }
    }
}