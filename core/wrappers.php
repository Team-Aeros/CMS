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

use WIPCMS\core\common\Registry;

function translate(string $identifier, string ...$parameters) : string {
    return Registry::retrieve('language')->read($identifier, ...$parameters);
}

function returnView(string $view, ?array $params = []) : string {
    return Registry::retrieve('gui')->returnView($view, $params);
}