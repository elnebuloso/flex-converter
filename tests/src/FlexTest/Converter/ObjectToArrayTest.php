<?php
namespace FlexTest\Convert;

use Flex\Converter\ObjectToArray;

/**
 * Class ObjectToArrayTest
 *
 * @package FlexTest\Convert
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ObjectToArrayTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    public function create() {
        $data = new \stdClass();
        $data->foo = new \stdClass();
        $data->foo->bar = array(
            1,
            2,
            3
        );

        $expected = array(
            'foo' => array(
                'bar' => array(
                    1,
                    2,
                    3
                )
            )
        );

        $converter = new ObjectToArray();
        $result = $converter->convert($data);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function createArray() {
        $data = new \stdClass();
        $data->foo = new \stdClass();
        $data->foo->bar = 'baz';

        $expected = array(
            'foo' => array(
                'bar' => 'baz'
            )
        );

        $converter = new ObjectToArray();
        $result = $converter->convert($data);
        $this->assertEquals($expected, $result);
    }
}