<?php
namespace elnebuloso\FlexTest\Convert;

use elnebuloso\Flex\Converter\ArrayToXml;
use PHPUnit_Framework_TestCase;

/**
 * Class ArrayToXmlTest
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ArrayToXmlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testCreateSimple()
    {
        $expected = '<?xml version="1.0" encoding="UTF-8"?><books><foo>1</foo><bar>2</bar><baz>3</baz></books>';
        $books = [
            'foo' => 1,
            'bar' => 2,
            'baz' => 3,
        ];

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
        $books = [
            'element' => [
                'foo',
                'bar',
                'baz',
            ],
        ];

        $converter = new ArrayToXml();
        $result = $this->filter($converter->convert('books', $books));
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function testCreateFull()
    {
        $expected = '<?xml version="1.0" encoding="UTF-8"?><books type="fiction"><book author="George Orwell"><title>1984</title><hasBooks>true</hasBooks></book><book author="Isaac Asimov"><title><![CDATA[Foundation]]></title><price>$15.61</price></book><book author="Robert A Heinlein"><title><![CDATA[Stranger in a Strange Land]]></title><price discount="10%">$18.00</price></book></books>';
        $books = [
            '@attributes' => [
                'type' => 'fiction',
            ],
            'book' => [
                [
                    '@attributes' => [
                        'author' => 'George Orwell',
                    ],
                    'title' => '1984',
                    'hasBooks' => true,
                ],
                [
                    '@attributes' => [
                        'author' => 'Isaac Asimov',
                    ],
                    'title' => [
                        '@cdata' => 'Foundation',
                    ],
                    'price' => '$15.61',
                ],
                [
                    '@attributes' => [
                        'author' => 'Robert A Heinlein',
                    ],
                    'title' => [
                        '@cdata' => 'Stranger in a Strange Land',
                    ],
                    'price' => [
                        '@attributes' => [
                            'discount' => '10%',
                        ],
                        '@value' => '$18.00',
                    ],
                ],
            ],
        ];

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

        /** @var \DOMDocument $expected */
        $converter->setXml($expected);
        $this->assertEquals($expected, $converter->getXml());
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function testInvalidTagName()
    {
        $converter = new ArrayToXml();
        $converter->convert('books', [
            '-foo' => 'bar',
        ]);
    }

    /**
     * @param $string
     * @return string
     */
    private function filter($string)
    {
        $string = preg_replace(
            [
                '/ {2,}/',
                '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s',
                '/>\s*/',
                '/\s*</',
            ],
            [
                ' ',
                '',
                '>',
                '<',
            ],
            $string
        );

        return $string;
    }
}
