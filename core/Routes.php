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

use Symfony\Component\Routing\{RequestContext, Route, RouteCollection};
use Symfony\Component\Routing\Matcher\UrlMatcher;

$routes = new RouteCollection();

/* ADD ROUTES BELOW THIS LINE */

$routes->add('admin', new Route('/admin', ['_controller' => WIPCMS\core\admin\controllers\main\Admin::class]));

$routes->add('home', new Route('/'));

/* ADD ROUTES ABOVE THIS LINE */

return $routes;