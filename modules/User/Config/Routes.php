<?php
/**
 * Define user routes
 *
 * @psalm-suppress UndefinedGlobalVariable
 */
 $routes->group('user', ['namespace' => '\Modules\User\Controllers'], function (object $routes) {
 	$routes->get('', 'User::index');
 	$routes->get('login', 'User::login');
 	$routes->get('logout', 'User::logout');
 	$routes->get('forgot_password', 'User::forgot_password');
 });
