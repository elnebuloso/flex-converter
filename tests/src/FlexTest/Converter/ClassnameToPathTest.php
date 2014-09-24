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
     * @test
     */
    public function convert() {
        $converter = new ClassnameToPath();
        $this->assertEquals('user/registration', $converter->convert('User\Registration'));
        $this->assertEquals('user/profile/add-nickname', $converter->convert('User\Profile\AddNickname'));
        $this->assertEquals('user/registration', $converter->convert('\\User\Registration\\'));
        $this->assertEquals('user/profile/add-nickname', $converter->convert('\\User\Profile\AddNickname\\'));
    }
}