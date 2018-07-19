<?php

use WIPCMS\core\common\Router;

class RouterTest extends PHPUnit\Framework\TestCase {

    private $_router;

    public function setUp() {
        $this->_router = new Router(__DIR__ . '/../../../core/Routes.php');
    }

    public function testGetHttpMethod() : void {
        $this->assertEquals('GET', $this->_router->getRequestContext()->getMethod());
    }
}