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

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/wrappers.php';

use WIPCMS\core\common\{GUI, Language, Registry, Router};
use WIPCMS\core\controllers\main\Core;

function init() : void {
    if (version_compare(phpversion(), REQUIRED_PHP_VERSION, '<'))
        die('Unsupported PHP version. PHP version ' . REQUIRED_PHP_VERSION . ' or higher is required.');

    ob_start();
    set_time_limit(25);

    ini_set('session.cookie_lifetime', '' . 10 * 365 * 24 * 60 * 60);

    if (!file_exists(__DIR__ . '/../vendor/autoload.php'))
        die('Could not find dependency autoloader. Please run <em>composer install</em>.');

    if (!file_exists(__DIR__ . '/../public/node_modules'))
        die('Could not find Javascript dependencies. Please run <em>npm install</em>.');

    if (CONFIG['debug']) {
        @error_reporting(E_ALL);
        @ini_set('display_errors', 'On');
    }

    session_start();

    Registry::store('router', new Router(__DIR__ . '/routes.php'));
    Registry::store('language', new Language(CONFIG['site']['default_language']));
    Registry::store('gui', new GUI());

    (new Core())->run();
}

function bootError(string $message) : string {
    ob_end_clean();
    die(sprintf('<h1>Fatal error</h1><p>%s</p>', CONFIG['debug'] ? $message : 'A fatal error occurred. Enable debug mode to see a more detailed error message.'));
}