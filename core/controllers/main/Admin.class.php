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

use WIPCMS\core\common\Controller;
use function WIPCMS\core\returnView;

class Admin extends Controller {

    public function showLogin() : void {
        echo returnView('login', ['page_title' => 'test title!']);
    }

    public function panel() : void {
        var_dump($_SESSION);
        echo "<a href='logout'>log out</a>";
    }
}