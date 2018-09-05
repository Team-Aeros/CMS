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

use WIPCMS\core\common\Router;
use WIPCMS\core\database\ORM;

class Authentication {

    public static function run(array $request) : void {
        if (isset($_SESSION['user']['email']) && isset($_SESSION['user']['password'])) {
            $repo = ORM::getInstance()->getEntityManager()->getRepository('User');
            $user = $repo->findOneBy(['email'    => $_SESSION['user']['email'],
                                      'password' => $_SESSION['user']['password']]);

            if ($user == null)
                Router::redirect('admin_login');
            elseif (Router::getRoute() == 'admin_login')
                Router::redirect('admin_panel');

        } elseif (Router::getRoute() !== 'admin_login')
                Router::redirect('admin_login');
    }
}