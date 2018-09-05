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

use WIPCMS\core\controllers\auth\Authorization as AuthorizationController;

class Authorization {

    public static function run(array $request) : void {
        if (empty($request['permission']))
            return;

        /**
         * @todo Replace with appropriate error message
         */
        if (AuthorizationController::checkUserPermission(Registry::get('user'), $request['permission']))
            bootError('User does not have the correct permission to access this area.');
    }
}