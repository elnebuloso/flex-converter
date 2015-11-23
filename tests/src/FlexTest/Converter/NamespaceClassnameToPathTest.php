<?php
namespace FlexTest\Convert;

use Flex\Converter\NamespaceClassnameToPath;

/**
 * Class NamespaceClassnameToPathTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class NamespaceClassnameToPathTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testConvert()
    {
        $converter = new NamespaceClassnameToPath();
        $this->assertEquals('user/registration', $converter->convert('User\Registration'));
        $this->assertEquals('user/profile/add-nickname', $converter->convert('User\Profile\AddNickname'));
        $this->assertEquals('user/registration', $converter->convert('\\User\Registration\\'));
        $this->assertEquals('user/profile/add-nickname', $converter->convert('\\User\Profile\AddNickname\\'));
    }
}
