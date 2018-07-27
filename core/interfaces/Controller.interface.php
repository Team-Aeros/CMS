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

namespace WIPCMS\core\interfaces;

interface Controller {

    /**
     * This method should return module context, such as the title, required permissions, etc.
     * @return array The module context
     */
    public function getModuleContext() : array;

    /**
     * Dependency injection. Used for inserting things like route info.
     * @param array $details Dependencies.
     */
    public function setup(array $details) : void;

    /**
     * Handles the necessary logic.
     * @return int Error code 0 for succcess, > 0 for failure
     */
    public function execute() : int;

    /**
     * Displays the template by making a call to the GUI controller.
     * @return int Error code 0 for succcess, > 0 for failure
     */
    public function display() : int;
}