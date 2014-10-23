<?php
namespace Flex\Converter;

use DomDocument;
use Exception;

/**
 * Class ArrayToXml
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 * @info inspired by
 * @link http://www.lalit.org/lab/convert-php-array-to-xml-with-attributes/
 */
class ArrayToXml {

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $encoding;

    /**
     * @var boolean
     */
    private $formatOutput;

    /**
     * @var DomDocument
     */
    private $xml;

    /**
     * @param string $version
     * @param string $encoding
     * @param bool $formatOutput
     */
    public function __construct($version = '1.0', $encoding = 'UTF-8', $formatOutput = true) {
        $this->version = $version;
        $this->encoding = $encoding;
        $this->formatOutput = $formatOutput;
    }

    /**
     * @param string $version
     */
    public function setVersion($version) {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getVersion() {
        return $this->version;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding($encoding) {
        $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getEncoding() {
        return $this->encoding;
    }

    /**
     * @param boolean $formatOutput
     */
    public function setFormatOutput($formatOutput) {
        $this->formatOutput = $formatOutput;
    }

    /**
     * @return boolean
     */
    public function getFormatOutput() {
        return $this->formatOutput;
    }

    /**
     * @param \DomDocument $xml
     */
    public function setXml($xml) {
        $this->xml = $xml;
    }

    /**
     * @return \DomDocument
     */
    public function getXml() {
        return $this->xml;
    }

    /**
     * @param string $nodeName
     * @param array $array
     * @return string
     */
    public function convert($nodeName, array $array = array()) {
        $this->xml = new DomDocument($this->version, $this->encoding);
        $this->xml->formatOutput = $this->formatOutput;
        $this->xml->appendChild($this->createXML($nodeName, $array));

        return $this->xml->saveXML();
    }

    /**
     * @param string $nodeName
     * @param array $array
     * @throws Exception
     * @return \DOMNode
     */
    private function createXML($nodeName, $array) {
        $node = $this->xml->createElement($nodeName);

        if(is_array($array)) {
            if(isset($array['@attributes'])) {
                foreach($array['@attributes'] as $key => $value) {
                    $this->testTagName($key, $nodeName);
                    $node->setAttribute($key, $this->createNodeContent($value));
                }

                unset($array['@attributes']);
            }

            // value, values cannot have child nodes, so set data and return node
            if(isset($array['@value'])) {
                $node->appendChild($this->xml->createTextNode($this->createNodeContent($array['@value'])));
                unset($array['@value']);

                return $node;
            }

            // cdata, cdata cannot have child nodes, so set data and return node
            else if(isset($array['@cdata'])) {
                $node->appendChild($this->xml->createCDATASection($this->createNodeContent($array['@cdata'])));
                unset($array['@cdata']);

                return $node;
            }
        }

        // possible subnodes
        if(is_array($array)) {
            foreach($array as $key => $value) {
                $this->testTagName($key, $nodeName);

                if(is_array($value) && is_numeric(key($value))) {
                    foreach($value as $v) {
                        $node->appendChild($this->createXML($key, $v));
                    }
                }
                else {
                    $node->appendChild($this->createXML($key, $value));
                }

                unset($array[$key]);
            }
        }

        if(!is_array($array)) {
            $node->appendChild($this->xml->createTextNode($this->createNodeContent($array)));
        }

        return $node;
    }

    /**
     * @param string $var
     * @return string
     */
    private function createNodeContent($var) {
        if(is_bool($var)) {
            return ($var) ? 'true' : 'false';
        }

        return $var;
    }

    /**
     * Check if the tag name or attribute name contains illegal characters
     *
     * @link http://www.w3.org/TR/xml/#sec-common-syn
     * @param string $tag
     * @return bool
     */
    private function isValidTagName($tag) {
        $pattern = '/^[a-z_]+[a-z0-9\:\-\.\_]*[^:]*$/i';

        return preg_match($pattern, $tag, $matches) && $matches[0] == $tag;
    }

    /**
     * @param string $tag
     * @param string $nodeName
     * @throws \Exception
     */
    private function testTagName($tag, $nodeName) {
        if(!$this->isValidTagName($tag)) {
            throw new Exception('illegal characters: ' . $tag . ' in node: ' . $nodeName);
        }
    }
}