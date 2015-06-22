<?php
namespace FlexTest\Convert;

use Flex\Converter\ArrayToXml;

/**
 * Class ArrayToXmlTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ArrayToXmlTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function testCreateSimple()
    {
        $expected = '<?xml version="1.0" encoding="UTF-8"?><books><foo>1</foo><bar>2</bar><baz>3</baz></books>';
        $books = array(
            'foo' => 1,
            'bar' => 2,
            'baz' => 3
        );

        $converter = new ArrayToXml();
        $result = $this->filter($converter->convert('books', $books));
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testCreateForCollection()
    {
        $expected = '<?xml version="1.0" encoding="UTF-8"?><books><element>foo</element><element>bar</element><element>baz</element></books>';
        $books = array(
            'element' => array(
                'foo',
                'bar',
                'baz'
            )
        );

        $converter = new ArrayToXml();
        $result = $this->filter($converter->convert('books', $books));
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testCreateFull()
    {
        $expected = '<?xml version="1.0" encoding="UTF-8"?><books type="fiction"><book author="George Orwell"><title>1984</title></book><book author="Isaac Asimov"><title><![CDATA[Foundation]]></title><price>$15.61</price></book><book author="Robert A Heinlein"><title><![CDATA[Stranger in a Strange Land]]></title><price discount="10%">$18.00</price></book></books>';
        $books = array(
            '@attributes' => array(
                'type' => 'fiction'
            ),
            'book' => array(
                array(
                    '@attributes' => array(
                        'author' => 'George Orwell'
                    ),
                    'title' => '1984'
                ),
                array(
                    '@attributes' => array(
                        'author' => 'Isaac Asimov'
                    ),
                    'title' => array(
                        '@cdata' => 'Foundation'
                    ),
                    'price' => '$15.61'
                ),
                array(
                    '@attributes' => array(
                        'author' => 'Robert A Heinlein'
                    ),
                    'title' => array(
                        '@cdata' => 'Stranger in a Strange Land'
                    ),
                    'price' => array(
                        '@attributes' => array(
                            'discount' => '10%'
                        ),
                        '@value' => '$18.00'
                    )
                )
            )
        );

        $converter = new ArrayToXml();
        $result = $this->filter($converter->convert('books', $books));
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testSetVersion()
    {
        $converter = new ArrayToXml();
        $expected = uniqid();
        $converter->setVersion($expected);
        $this->assertEquals($expected, $converter->getVersion());
    }

    /**
     * @test
     */
    public function testSetEncoding()
    {
        $converter = new ArrayToXml();
        $expected = uniqid();
        $converter->setEncoding($expected);
        $this->assertEquals($expected, $converter->getEncoding());
    }

    /**
     * @test
     */
    public function testSetFormatOutput()
    {
        $converter = new ArrayToXml();
        $expected = uniqid();
        $converter->setFormatOutput($expected);
        $this->assertEquals($expected, $converter->getFormatOutput());
    }

    /**
     * @test
     */
    public function testSetXml()
    {
        $converter = new ArrayToXml();
        $expected = uniqid();
        $converter->setXml($expected);
        $this->assertEquals($expected, $converter->getXml());
    }

    /**
     * @param $string
     * @return string
     */
    private function filter($string)
    {
        $string = preg_replace(
            array(
                '/ {2,}/',
                '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s',
                '/>\s*/',
                '/\s*</'
            ),
            array(
                ' ',
                '',
                '>',
                '<'
            ),
            $string
        );

        return $string;
    }
}
