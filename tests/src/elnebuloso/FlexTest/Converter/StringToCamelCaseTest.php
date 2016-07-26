<?php
namespace elnebuloso\FlexTest\Convert;

use elnebuloso\Flex\Converter\StringToCamelCase;
use PHPUnit_Framework_TestCase;

/**
 * Class StringToCamelCaseTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class StringToCamelCaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConvert()
    {
        $converter = new StringToCamelCase();
        $this->assertEquals('fooBarBaz', $converter->convert('foo_bar_baz'));
        $this->assertEquals('fooBarBaz', $converter->convert('foo-bar-baz', '-'));
        $this->assertEquals('fooBarBaz', $converter->convert('foo bar baz', ' '));
    }
}
