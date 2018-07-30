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
use WIPCMS\core\controllers\main\Homepage;
use WIPCMS\core\controllers\main\Admin;

$routes = new RouteCollection();

/* ADD ROUTES BELOW THIS LINE */

$routes->add('home', new Route('/', ['Homepage::test']));
//$routes->add('home', new Route('/', ['controller' => Homepage::class]));
$routes->add('admin', new Route('/admin', ['controller' => Admin::class]));

/* ADD ROUTES ABOVE THIS LINE */

return $routes;