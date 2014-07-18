<?php
namespace FlexTest\Convert;

use Flex\Converter\ClassnameToPath;

/**
 * Class ClassnameToPathTest
 *
 * @package FlexTest\Convert
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ClassnameToPathTest extends \PHPUnit_Framework_TestCase {

    /**
     * @return void
     */
    public function test_convert() {
        $this->assertEquals('user/registration', ClassnameToPath::convert('User\Registration'));
        $this->assertEquals('user/profile/add-nickname', ClassnameToPath::convert('User\Profile\AddNickname'));
    }
}