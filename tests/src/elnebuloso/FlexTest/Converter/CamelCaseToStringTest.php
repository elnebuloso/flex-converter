<?php
namespace elnebuloso\FlexTest\Convert;

use elnebuloso\Flex\Converter\CamelCaseToString;
use PHPUnit_Framework_TestCase;

/**
 * Class CamelCaseToStringTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class CamelCaseToStringTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConvert()
    {
        $converter = new CamelCaseToString();
        $this->assertEquals('Foo_Bar_Baz', $converter->convert('FooBarBaz'));
        $this->assertEquals('Foo-Bar-Baz', $converter->convert('FooBarBaz', '-'));
        $this->assertEquals('Foo Bar Baz', $converter->convert('FooBarBaz', ' '));
    }
}
