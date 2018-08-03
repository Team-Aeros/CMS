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

namespace WIPCMS\core\controllers\main;

use WIPCMS\core\common\Controller;
use WIPCMS\core\database\ORM;
use function WIPCMS\core\returnView;

class Admin extends Controller {

    public function showLogin() : void {
        echo returnView('login', ['page_title' => 'test title!']);
    }

    public function login() : void {
        $repo = ORM::getInstance()->getEntityManager()->getRepository('User');
        $user = $repo->findOneBy(['email' => $_POST['email'], 'password' => $_POST['password']]);
        if ($user != null) {
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['password'] = $user->getPassword();
            header("Location: admin/panel");
            die;
        }
        header("Location: admin");
        die;
    }

    public function panel() : void {
        $repo = ORM::getInstance()->getEntityManager()->getRepository('User');
        $user = $repo->findOneBy(['email' => $_SESSION['email'], 'password' => $_SESSION['password']]);

        // Wederom middleware!
        if ($user == null) {
            header("Location: admin");
            die;
        }

        var_dump($_SESSION);
        echo "<a href='logout'>log out</a>";
    }

    public function logout() : void {
        session_destroy();
        echo "you are logged out!";
    }
}