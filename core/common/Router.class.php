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
use Symfony\Component\Routing\{RequestContext, Route, RouteCollection};
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class Router {

    private $_fileLocation;
    private $_routeCollection;
    private $_requestContext;
    private $_matcher;

    public function __construct(string $routeFileLocation, string $path = '/') {
        $this->_fileLocation = $routeFileLocation ?? 'Routes.php';

        $this->loadRoutesFile();
        $this->setupRequestContext($path);
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

    private function setupRequestContext(string $path) : void {
        $this->_requestContext = new RequestContext($path);
    }

    private function setupMatcher() : void {
        $this->_matcher = new UrlMatcher($this->_routeCollection, $this->_requestContext);
    }

    public function match(string $url) : array {
        return [];
    }

    public function getRouteCollection() : RouteCollection {
        return $this->_routeCollection;
    }

    public function getRequestContext() : RequestContext {
        return $this->_requestContext;
    }
}