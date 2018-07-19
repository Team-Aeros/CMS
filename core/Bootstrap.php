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

declare(strict_types = 1);

define('REQUIRED_PHP_VERSION', '7.2.0');
define('DEBUG', true);

require __DIR__ . '/../vendor/autoload.php';

use WIPCMS\core\admin\controllers\main\Admin;
use WIPCMS\core\controllers\main\Core;

function init(bool $admin = false) : void {
    if (version_compare(phpversion(), REQUIRED_PHP_VERSION, '<'))
        die('Unsupported PHP version. PHP version ' . REQUIRED_PHP_VERSION . ' or higher is required.');

    ob_start();
    set_time_limit(25);

    ini_set('session.cookie_lifetime', '' . 10 * 365 * 24 * 60 * 60);

    if (!file_exists(__DIR__ . '/../vendor/autoload.php'))
        die('Could not find dependency autoloader. Please run <em>composer install</em>.');

    if (DEBUG) {
        @error_reporting(E_ALL);
        @ini_set('display_errors', 'On');
    }

    (new Core())->run();
}