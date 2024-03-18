<?php

use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
//$routes->get('/', 'Home::index');

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);