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
        $converter = new CamelCaseToString();
        $this->assertEquals('Foo_Bar_Baz', $converter->convert('FooBarBaz'));
        $this->assertEquals('Foo-Bar-Baz', $converter->convert('FooBarBaz', '-'));
        $this->assertEquals('Foo Bar Baz', $converter->convert('FooBarBaz', ' '));
    }
}