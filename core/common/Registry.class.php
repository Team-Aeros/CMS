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

namespace WIPCMS\core\common;

use Exception;
use WIPCMS\core\interfaces\Storable;

class Registry {

    private static $_objects = [];

    public static function store(string $identifier, Storable $storable) : Storable {
        return self::$_objects[$identifier] = $storable;
    }

    public static function retrieve(string $identifier) : Storable {
        if (isset(self::$_objects[$identifier]))
            return self::$_objects[$identifier];

        throw new Exception('Object with identifier ' . $identifier . ' is not in storage.');
    }
}