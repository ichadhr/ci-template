<?php
/**
 * Modules user controllers
 */

namespace Modules\User\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
	/**
	 * validation library
	 *
	 * @var \CodeIgniter\Validation\Validation
	 */
	protected $validation;

	// init view data
	protected array $viewData = [];

	// init ajax data
	protected array $ajaxData = [];

	public function __construct()
	{
		// init form validation1
		$this->validation = \Config\Services::validation();
	}

	/**
	 * index list of user
	 *
	 * @return string|\CodeIgniter\HTTP\RedirectResponse
	 */
	public function index()
	{
		if (!$this->ionAuth->loggedIn()) {
			// redirect them to the login page
			return redirect()->to('login');
		} elseif (!$this->ionAuth->isAdmin()) {
			$this->response->setStatusCode(403);
		} else {
			echo 'hello';
		}
	}

	/**
	 * login page
	 *
	 * @return string|object|\CodeIgniter\HTTP\RedirectResponse
	 */
	public function login()
	{
		if ($this->ionAuth->loggedIn()) {
			// redirect
			return redirect()->to('dashboard');
		}

		$this->viewData['title'] = 'Login';

		// get identity value from IonAuth config
		$authIdentity = $this->configIonAuth->identity;

		// validate form input
		if ('email' === $authIdentity) {
			$this->validation->setRule('identity', str_replace(':', '', lang('Interface.userForm.email')), 'required|valid_email');
		} else {
			$this->validation->setRule('identity', str_replace(':', '', lang('Interface.userForm.username')), 'required');
		}

		$this->validation->setRule('password', str_replace(':', '', lang('Interface.userForm.password')), 'required');

		if ($this->request->getPost() && $this->request->isAJAX()) {
			// check form validation passed
			if ($this->validation->withRequest($this->request)->run()) {
				// it is valid form
				$this->ajaxData['valid_form'] = TRUE;

				// check for "remember me"
				$remember = (bool) $this->request->getVar('remember');

				// get inputs post
				$identity = $this->request->getVar('identity');
				$password = $this->request->getVar('password');

				// check to see if the user is logging in
				if ($this->ionAuth->login($identity, $password, $remember)) {
					// if the login is successful
					$this->ajaxData['succeed']  = TRUE;
					$this->ajaxData['messages'] = successDelimiter($this->ionAuth->messages());
					// set additional session
					$this->_session_login();
				} else {
					// if the login was un-successful
					$this->ajaxData['succeed']  = FALSE;
					$this->ajaxData['messages'] = errorDelimiter($this->ionAuth->errors());
				}
			} else {
				// has error validation
				foreach (array_keys($_POST) as $key) {
					$this->ajaxData['validation_message_errors'][$key] = $this->validation->showError($key, 'error_validation');
				}
			}

			// render data ajax
			return $this->_renderJson($this->ajaxData);
		}

		// setup form
		if ('email' === $authIdentity) {
			$this->viewData['identity'] = [
				'name'         => 'identity',
				'id'           => 'identity',
				'type'         => 'text',
				'class'        => 'form-control',
				'placeholder'  => lang('Interface.userForm.email'),
				'autofocus'    => '',
				'autocomplete' => 'off',
				'value'        => set_value('identity')
			];
		} else {
			$this->viewData['identity'] = [
				'name'         => 'identity',
				'id'           => 'identity',
				'type'         => 'text',
				'class'        => 'form-control',
				'placeholder'  => lang('Interface.userForm.username'),
				'autofocus'    => '',
				'autocomplete' => 'off',
				'value'        => set_value('identity')
			];
		}

		$this->viewData['password'] = [
			'name'         => 'password',
			'id'           => 'password',
			'type'         => 'password',
			'class'        => 'form-control',
			'placeholder'  => lang('Interface.userForm.password'),
			'autocomplete' => 'off'
		];

		return $this->_renderPage('\Modules\User\Views\login', $this->viewData);
	}

	/**
	 * logout
	 *
	 * @return string|\CodeIgniter\HTTP\RedirectResponse
	 */
	public function logout()
	{
		$this->viewData['title'] = 'Logout';

		// log the user out
		$logout = $this->ionAuth->logout();

		if ($logout) {
			$this->session->setFlashdata('messages', infoDelimiter($this->ionAuth->messages()));
		} else {
			$this->session->setFlashdata('messages', errorDelimiter($this->ionAuth->errors()));
		}
		// redirect them to the login page
		return redirect()->to('login')->withCookies();
	}

	/**
	 * forgot password
	 *
	 * @return string|\CodeIgniter\HTTP\RedirectResponse
	 */
	public function forgot_password()
	{
		$this->viewData['title'] = 'Forgot password';
		return $this->_renderPage('\Modules\User\Views\forgot_password', $this->viewData);
	}

	// hooks after login set data to session
	private function _session_login()
	{
		$user  = $this->ionAuth->user($this->session->get('user_id'))->row();
		$group =  $this->ionAuth->getUsersGroups($this->session->get('user_id'))->getRow();

		$datetimeFormat = 'd-m-Y H:i:s';
		$date           = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
		$date->setTimestamp($this->session->get('old_last_login'));

		$data = [
			'full_name'            => $user->first_name . ' ' . $user->last_name,
			'first_name'           => $user->first_name,
			'last_name'            => $user->last_name,
			'group'                => $group->description,
			'group_name'           => $group->name,
			'group_id'             => $group->id,
			'readadble_last_login' => $date->format($datetimeFormat)
		];

		// set new data to session
		$this->session->set($data);
	}
}
