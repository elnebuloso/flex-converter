<?php
namespace FlexTest\Convert;

use Flex\Converter\ArrayToObject;

/**
 * Class ArrayToObjectTest
 *
 * @package FlexTest\Convert
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ArrayToObjectTest extends \PHPUnit_Framework_TestCase {

    /**
     * @return void
     */
    public function test_create() {
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

        $result = ArrayToObject::convert($data);
        $this->assertEquals($expected, $result);
    }

    /**
     * @return void
     */
    public function test_create_object() {
        $data = array(
            'foo' => array(
                'bar' => 'baz'
            )
        );

        $expected = new \stdClass();
        $expected->foo = new \stdClass();
        $expected->foo->bar = 'baz';

        $result = ArrayToObject::convert($data);
        $this->assertEquals($expected, $result);
    }
}