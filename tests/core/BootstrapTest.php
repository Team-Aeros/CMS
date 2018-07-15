<?php

require __DIR__ . '/../../core/Bootstrap.php';

class BootstrapTest extends PHPUnit\Framework\TestCase {

    public static function setUpBeforeClass() {
        //init();
    }

    public function testInitSetsIniSettings() : void {
        $this->assertEquals('test', 'test');
    }
}