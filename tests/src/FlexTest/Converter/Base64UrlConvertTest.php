<?php
namespace elnebuloso\FlexTest\Convert;

use elnebuloso\Flex\Converter\Base64UrlDecode;
use elnebuloso\Flex\Converter\Base64UrlEncode;
use PHPUnit_Framework_TestCase;

/**
 * Class Base64UrlConvertTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class Base64UrlConvertTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testEncodeDecode()
    {
        $encoder = new Base64UrlEncode();
        $decoder = new Base64UrlDecode();

        $encoded = $encoder->convert('foo bar baz');
        $this->assertEquals('foo bar baz', $decoder->convert($encoded));
    }
}
