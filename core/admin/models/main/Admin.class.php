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

namespace WIPCMS\core\admin\models\main;

use WIPCMS\core\interfaces\Model;

class Admin implements Model {

    public function getTitle() : string {
        return 'Admin panel';
    }
}