<?php
namespace elnebuloso\FlexTest\Convert;

use elnebuloso\Flex\Converter\PathToNamespaceClassname;
use PHPUnit_Framework_TestCase;

/**
 * Class PathToNamespaceClassnameTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class PathToNamespaceClassnameTest extends PHPUnit_Framework_TestCase
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
