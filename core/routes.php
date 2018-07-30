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

$routes->add('home', new Route('/', ['Homepage::test']));
$routes->add('test', new Route('/test', ['Homepage::showParams', ['hello', 1, 'hoi'] ]));

/* ADD ROUTES ABOVE THIS LINE */

return $routes;