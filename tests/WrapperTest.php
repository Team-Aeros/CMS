<?php

use WIPCMS\core\common\{Language, Registry};

require __DIR__ . '/../core/wrappers.php';

use function WIPCMS\core\translate;

class WrapperTest extends PHPUnit\Framework\TestCase {

    public function setUp() {
        Registry::store('language', new Language('en_US'));
    }

    public function testLanguageStringWithoutParameters() : void {
        $this->assertEquals('Hello, %s!', translate('main.hello'));
    }

    public function testLanguageStringWithParameters() : void {
        $this->assertEquals('Hello, John Doe!', translate('main.hello', 'John Doe'));
    }
}