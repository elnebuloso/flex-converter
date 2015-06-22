<?php
namespace FlexTest\Convert;

use Flex\Converter\PathToNamespaceClassname;

/**
 * Class PathToNamespaceClassnameTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class PathToNamespaceClassnameTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function testConvert()
    {
        $converter = new PathToNamespaceClassname();
        $this->assertEquals('User\Registration', $converter->convert('user/registration'));
        $this->assertEquals('User\Profile\AddNickname', $converter->convert('user/profile/add-nickname'));
        $this->assertEquals('User\Registration', $converter->convert('//user/registration//'));
        $this->assertEquals('User\Profile\AddNickname', $converter->convert('//user/profile/add-nickname//'));
    }
}
