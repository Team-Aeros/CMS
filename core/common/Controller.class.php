<?php
/**
 * Created by PhpStorm.
 * User: janhendrik
 * Date: 2-8-18
 * Time: 15:11
 */

namespace WIPCMS\core\common;


use Twig_Environment;
use Twig_Loader_Filesystem;

class Controller
{
    private static $twig;

    protected function view($template, $params) {
        if (self::$twig == null) {
            $loader = new Twig_Loader_Filesystem(CONFIG['templates']);
            self::$twig = new Twig_Environment($loader);
        }
        try {
            return self::$twig->render($template, $params);
        } catch (\Twig_Error_Loader | \Twig_Error_Runtime | \Twig_Error_Syntax$e) {
            echo $e;
        }
        return null;
    }
}