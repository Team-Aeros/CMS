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

namespace WIPCMS\core\controllers\main;

use WIPCMS\core\common\Registry;

class Core {

    private $_router;
    private $_module;
    private $_moduleContext;

    public function __construct() {
        $this->_router = Registry::retrieve('router');
    }

    public function run() : void {
        $this->loadModule();

        $returnCode = $this->_module->execute();

        if ($returnCode === 0)
            $this->_module->display();

        echo 'Current section: ', $this->_moduleContext['title'];
    }

    private function loadModule() : void {
        $route = $this->_router->getCurrentRoute();

        if (count($route) === 0)
            die(sprintf('Unable to get route: %s on line %u', __FILE__, __LINE__));

        $this->_module = new $route['controller'];
        $this->_module->setup(['router' => $this->_router]);
        $this->_moduleContext = $this->_module->getModuleContext();
    }
}