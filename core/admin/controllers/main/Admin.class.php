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

namespace WIPCMS\core\admin\controllers\main;

use WIPCMS\core\admin\models\main\Admin as Model;
use WIPCMS\core\interfaces\Controller;

class Admin implements Controller {

    private $_routeInfo;
    private $_model;

    public function __construct() {
        $this->_model = new Model();
    }

    public function setup(array $details) : void {
        $this->_routeInfo = $details['routeinfo'];
    }

    public function getModuleContext() : array {
        return [
            'title' => $this->_model->getTitle()
        ];
    }

    public function execute() : int {
        return 0;
    }

    public function display() : int {
        return 0;
    }
}