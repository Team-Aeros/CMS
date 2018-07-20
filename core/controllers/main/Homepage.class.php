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

use WIPCMS\core\interfaces\Controller;

class Homepage implements Controller {

    public function setup(array $details) : void {

    }

    public function getModuleContext() : array {
        return [
            'title' => 'Homepage'
        ];
    }

    public function execute() : int {
        return 0;
    }

    public function display() : int {
        return 0;
    }
}