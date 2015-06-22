<?php
namespace FlexTest\Convert;

use Flex\Converter\ArrayToObject;

/**
 * Class ArrayToObjectTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ArrayToObjectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function testCreate()
    {
        $data = array(
            'foo' => array(
                'bar' => array(
                    1,
                    2,
                    3
                )
            )
        );

        $expected = new \stdClass();
        $expected->foo = new \stdClass();
        $expected->foo->bar = array(
            1,
            2,
            3
        );

        $converter = new ArrayToObject();
        $result = $converter->convert($data);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testCreateObject()
    {
        $data = array(
            'foo' => array(
                'bar' => 'baz'
            )
        );

        $expected = new \stdClass();
        $expected->foo = new \stdClass();
        $expected->foo->bar = 'baz';

        $converter = new ArrayToObject();
        $result = $converter->convert($data);
        $this->assertEquals($expected, $result);
    }
}
