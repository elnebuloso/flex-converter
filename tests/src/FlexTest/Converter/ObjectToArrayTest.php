<?php
namespace elnebuloso\FlexTest\Convert;

use elnebuloso\Flex\Converter\ObjectToArray;
use PHPUnit_Framework_TestCase;

/**
 * Class ObjectToArrayTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ObjectToArrayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testCreate()
    {
        $data = new \stdClass();
        $data->foo = new \stdClass();
        $data->foo->bar = [
            1,
            2,
            3,
        ];

        $expected = [
            'foo' => [
                'bar' => [
                    1,
                    2,
                    3,
                ],
            ],
        ];

        $converter = new ObjectToArray();
        $result = $converter->convert($data);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testCreateArray()
    {
        $data = new \stdClass();
        $data->foo = new \stdClass();
        $data->foo->bar = 'baz';

        $expected = [
            'foo' => [
                'bar' => 'baz',
            ],
        ];

        $converter = new ObjectToArray();
        $result = $converter->convert($data);
        $this->assertEquals($expected, $result);
    }
}
