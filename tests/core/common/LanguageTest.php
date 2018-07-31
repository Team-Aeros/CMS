<?php

use WIPCMS\core\common\Language;

class LanguageTest extends PHPUnit\Framework\TestCase {

    public function testStringWithoutParameters() : void {
        $language = new Language('en_US');
        $this->assertEquals('Hello, %s!', $language->read('main.hello'));
    }

    public function testStringWithParameters() : void {
        $language = new Language('en_US');
        $this->assertEquals('Hello, John Doe!', $language->read('main.hello', 'John Doe'));
    }

    public function testDefaultLocaleHasMain() : void {
        $language = new Language('en_US');
        $this->assertNotNull($language->findLanguageFile('main'));
    }
}