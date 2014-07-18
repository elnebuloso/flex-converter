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
        $this->assertEquals('User\Registration', PathToClassname::convert('user/registration'));
        $this->assertEquals('User\Profile\AddNickname', PathToClassname::convert('user/profile/add-nickname'));
    }
}