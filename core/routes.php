<?php
/**
 * WIP CMS
 * Open source content management system
 *
 * @version 1.0 Alpha 1
 * @author Aeros Development
 * @copyright 2018, WIP CMS
 * @link https://aeros.com/wipcms
 *
 * @license MIT
 */

namespace WIPCMS\core;

use Symfony\Component\Routing\{Route, RouteCollection};

$routes = new RouteCollection();

/* ADD ROUTES BELOW THIS LINE */

$routes->add('home', new Route('/', ['Homepage@test']));

$routes->add('admin_login', new Route('/admin',      ['main\Admin@showLogin', 'middleware' => ['authentication']]));
$routes->add('admin_panel', new Route('/admin/panel', ['main\Admin@panel'    , 'middleware' => ['authentication']]));

$routes->add('auth_login',  new Route('/login',       ['auth\Authentication@login']));
$routes->add('auth_logout', new Route('admin/logout', ['auth\Authentication@logout']));

$routes->add('test_middleware', new Route('/admin/{test}', ['main\Admin@showLogin', 'middleware' => ['test']]));

/* ADD ROUTES ABOVE THIS LINE */

return $routes;