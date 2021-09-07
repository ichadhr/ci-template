<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var CLIRequest|IncomingRequest|RequestInterface
	 */
	protected $request;

	protected $response;
	protected $logger;
	protected $validator;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['url', 'form', 'utils_helper'];

	/**
	 * Session
	 */
	protected \CodeIgniter\Session\Session $session;

	/**
	 * IonAuth library
	 */
	protected \IonAuth\Libraries\IonAuth $ionAuth;

	/**
	 * Configuration
	 */
	protected \IonAuth\Config\IonAuth $configIonAuth;

	/**
	 * view data render
	 */
	protected array $viewData;

	public function __construct()
	{
		// init $viewData
		$this->viewData = [];
	}

	/**
	 * Constructor.
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) : void
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------

		// init session service
		$this->session = \Config\Services::session();

		// init IonAuth
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();

		// IonAuth config
		$this->configIonAuth = config('IonAuth');
	}

	/**
	 * render specific view
	 *
	 * @param string $view
	 * @param array|null $data
	 * @return string
	 */
	protected function _renderPage(string $view, ?array $data = NULL) : string
	{
		$dataView = $data ?: $this->viewData;

		$viewHtml = view($view, $dataView);

		return $viewHtml;
	}

	/**
	 * Undocumented function
	 *
	 * @param string|array $data
	 * @param boolean $token
	 * @param boolean $validate
	 * @return object
	 */
	protected function _renderJson(string|array $data = NULL) : object
	{
		$data['sec_n'] = csrf_token();
		$data['sec_h'] = csrf_hash();
		return $this->response->setStatusCode(200)->setContentType('application/json', 'utf-8')->setJSON($data);
	}
}
