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

use WIPCMS\core\database\ORM;
use WIPCMS\core\entities\User;

class Authorization {

    public static function checkUserPermission(User $user, string $permission) : bool {
        if (empty($permission))
            return false;

        // No need to check for permissions if we're dealing with the root user
        if ($user->isRoot())
            return true;

        $repository = ORM::getInstance()->getEntityManager()->getRepository('PermissionProfile');
        $permissionProfile = $repository->findOneBy(['id' => $user->getGroup()]);

        // If there are no permissions, someone probably screwed up. Just return false for the time being.
        if (empty($permissionProfile))
            return false;

        $methodName = 'get' . ucfirst($permission);

        return method_exists($permissionProfile, $methodName) && $permissionProfile->$methodName() == 1;
    }
}