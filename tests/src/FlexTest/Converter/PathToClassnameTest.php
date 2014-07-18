<?php
namespace FlexTest\Convert;

use Flex\Converter\PathToClassname;

/**
 * Class PathToClassnameTest
 *
 * @package FlexTest\Convert
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class PathToClassnameTest extends \PHPUnit_Framework_TestCase {

    /**
     * @return void
     */
    public function test_convert() {
        $converter = new PathToClassname();
        $this->assertEquals('User\Registration', $converter->convert('user/registration'));
        $this->assertEquals('User\Profile\AddNickname', $converter->convert('user/profile/add-nickname'));
        $this->assertEquals('User\Registration', $converter->convert('//user/registration//'));
        $this->assertEquals('User\Profile\AddNickname', $converter->convert('//user/profile/add-nickname//'));
    }
}