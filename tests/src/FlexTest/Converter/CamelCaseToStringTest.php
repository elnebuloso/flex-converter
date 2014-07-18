<?php
namespace FlexTest\Convert;

use Flex\Converter\CamelCaseToString;

/**
 * Class CamelCaseToStringTest
 *
 * @package FlexTest\Convert
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class CamelCaseToStringTest extends \PHPUnit_Framework_TestCase {

    /**
     * @return void
     */
    public function test_convert() {
        $this->assertEquals('Foo_Bar_Baz', CamelCaseToString::convert('FooBarBaz'));
        $this->assertEquals('Foo-Bar-Baz', CamelCaseToString::convert('FooBarBaz', '-'));
        $this->assertEquals('Foo Bar Baz', CamelCaseToString::convert('FooBarBaz', ' '));
    }
}