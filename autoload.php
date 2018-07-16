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
spl_autoload_register(function(string $classname) : void {
    $parts = explode('\\', $classname);

    if ($parts[0] === 'WIPCMS')
        unset($parts[0]);

    $filename = implode('/', $parts);

    // Load the file if we can. If not, it's not our problem.
    if (file_exists($location = __DIR__ . '/' . $filename . '.class.php'))
        require $location;
    else if (file_exists($location = __DIR__ . '/' . $filename . '.interface.php'))
        require $location;
});