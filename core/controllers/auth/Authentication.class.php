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

namespace WIPCMS\core\controllers\auth;

use WIPCMS\core\common\Controller;
use WIPCMS\core\common\Router;
use WIPCMS\core\database\ORM;

class Authentication extends Controller {
    public function login() : void {
        $repo = ORM::getInstance()->getEntityManager()->getRepository('User');
        $user = $repo->findOneBy(['email' => $_POST['email'], 'password' => $_POST['password']]);

        if ($user != null) {
            $_SESSION['user']['email'] = $user->getEmail();
            $_SESSION['user']['password'] = $user->getPassword();
            Router::redirect("admin_panel");
        }
        Router::redirect("admin_login");
    }

    public function logout() : void {
        session_destroy();
        Router::redirect('admin_login');
    }
}