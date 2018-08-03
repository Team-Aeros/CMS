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

$routes->add('admin_panel', new Route('admin/panel', ['Admin@panel']));
$routes->add('admin_logout', new Route('admin/logout', ['Admin@logout']));
$routes->add('admin_login', new Route('/admin', ['Admin@showLogin']));
$routes->add('login', new Route('/login', ['Admin@login']));


/* ADD ROUTES ABOVE THIS LINE */

return $routes;