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

use WIPCMS\core\middleware\Authorization;

class Middleware {

    private const MIDDLEWARES = [
        'authorization' => Authorization::class
    ];

    // The following middleware will ALWAYS be run. Each element should be a string containing an existing key in MIDDLEWARES.
    private const DEFAULT_MIDDLEWARES = [
        'authorization'
    ];

    public static function checkRequest(array $request) : void {
        // Strings should be turned into arrays
        if (!empty($middleware = $request['middleware'] ?? []) && !is_array($middleware))
            $middleware = [$middleware];

        $middleware = array_merge($middleware, self::DEFAULT_MIDDLEWARES);

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