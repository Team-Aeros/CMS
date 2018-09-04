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

use WIPCMS\core\middleware\Test;

class Middleware {

    private const MIDDLEWARES = [
        'test' => Test::class 
    ];

    public static function checkRequest(array $request) : void {
        if (!empty($middleware = $request['middleware'])) {
            // Strings should be turned into arrays
            if (!is_array($middleware))
                $middleware = [$middleware];

            foreach ($middleware as $key) {
                if (!array_key_exists($key, self::MIDDLEWARES))
                    die('Call to undefined middleware ' . $key);

                $current = self::MIDDLEWARES[$key];

                if (method_exists($current, '::run()'))
                    die(sprintf('Invalid middleware %s: run() method does not exist ', $key));

                $object = ($current)::run($request);
            }
        }
    }
}