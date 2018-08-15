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

namespace WIPCMS\core\middleware;

class Test {

    public static function run(array $request) : void {
        echo '<pre>';
        print_r($request);
        echo '</pre>';
    }
}