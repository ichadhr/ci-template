<?php
/**
 * Define dashboard routes
 * 
 * @psalm-suppress UndefinedGlobalVariable
 */
 $routes->group('dashboard', ['namespace' => '\Modules\Dashboard\Controllers'], function(object $routes)
 {
     $routes->get('', 'Dashboard::index');
 });