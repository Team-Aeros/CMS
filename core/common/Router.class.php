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

namespace WIPCMS\core\common;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\{RequestContext, Route, RouteCollection};
use Symfony\Component\Routing\Exception\{NoConfigurationException, ResourceNotFoundException, RouteNotFoundException};
use Symfony\Component\Routing\Matcher\UrlMatcher;
use WIPCMS\core\interfaces\Storable;

class Router implements Storable {

    private $_fileLocation;
    private $_routeCollection;
    private $_requestContext;
    private $_matcher;

    public function __construct(string $routeFileLocation) {
        $this->_fileLocation = $routeFileLocation ?? 'routes.php';

        $this->loadRoutesFile();
        $this->setupRequestContext();
        $this->setupMatcher();
    }

    private function loadRoutesFile() : void {
        if (file_exists($this->_fileLocation)) {
            $this->_routeCollection = require $this->_fileLocation;

            // We've loaded the correct file
            if (!empty($this->_routeCollection) && $this->_routeCollection instanceof RouteCollection)
                return;
        }

        throw new Exception('Could not load routes file: ' . $this->_fileLocation);
    }

    private function setupRequestContext() : void {
        $this->_requestContext = new RequestContext();
        $this->_requestContext->fromRequest(Request::createFromGlobals());
    }

    private function setupMatcher() : void {
        $this->_matcher = new UrlMatcher($this->_routeCollection, $this->_requestContext);
    }

    public function getRouteCollection() : RouteCollection {
        return $this->_routeCollection;
    }

    public function getRequestContext() : RequestContext {
        return $this->_requestContext;
    }

    public function getCurrentRoute() : array {
        $pathInfo = $this->_requestContext->getPathInfo();
        $route = $this->findRoute($pathInfo);

        if (empty($route) && substr($_SERVER['REQUEST_URI'], -1) === '/')
            $route = $this->findRoute(rtrim($pathInfo, '/'));

        return $route;
    }

    private function findRoute(string $pathInfo) : array {
        $route = [];

        try {
            $route = $this->_matcher->match($pathInfo);
        }
        catch (RouteNotFoundException | ResourceNotFoundException | NoConfigurationException $e) {
            // do nothing
        }

        return $route;
    }

    public static function redirect($route) : void {
        ob_clean();
        header("Location: " . CONFIG['urls']['root'] . "/index.php/" . $route);
        die;
    }
}