<?php
/**
 * Define template routes
 * 
 * @psalm-suppress UndefinedGlobalVariable
 */
 $routes->group('template', ['namespace' => '\Modules\Template\Controllers'], function(object $routes)
 {
     $routes->get('', 'Template::index');
 });