<?php
namespace FlexTest\Convert;

use Flex\Converter\StringToCamelCase;

/**
 * Class StringToCamelCaseTest
 *
 * @package FlexTest\Convert
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class StringToCamelCaseTest extends \PHPUnit_Framework_TestCase {

    /**
     * @return void
     */
    public function test_convert() {
        $this->assertEquals('fooBarBaz', StringToCamelCase::convert('foo_bar_baz'));
        $this->assertEquals('fooBarBaz', StringToCamelCase::convert('foo-bar-baz', '-'));
        $this->assertEquals('fooBarBaz', StringToCamelCase::convert('foo bar baz', ' '));
    }
}