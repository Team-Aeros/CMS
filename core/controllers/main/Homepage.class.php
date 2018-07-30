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

class Homepage {
    static function test() {
        echo 'Dit werkt!';
    }

    static function showParams($param1, $param2, $param3) {
        echo "these are the params: " . $param1 . ', ' . $param2 . ', ' . $param3;
    }
}