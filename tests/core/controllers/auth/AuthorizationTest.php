<?php

class AuthorizationTest extends PHPUnit\Framework\TestCase {

    private static $_user;

    public static function setUpBeforeClass() {
        self::$_user = new User();
        //$this->setupUser();
    }

    public function testInitSetsIniSettings() : void {
        $this->assertEquals('test', 'test');
    }

    private function setupUser() : void {

    }
}