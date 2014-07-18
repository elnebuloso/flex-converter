<?php
namespace Flex\Converter;

/**
 * Class PathToClassname
 *
 * @package Flex\Converter
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class PathToClassname {

    /**
     * @param string $string
     * @return string
     */
    public function convert($string) {
        $stringToCamelCase = new StringToCamelCase();
        $parts = array();

        foreach(explode('/', trim($string, '/')) as $part) {
            $parts[] = ucfirst($stringToCamelCase->convert($part, '-'));
        }

        return implode('\\', $parts);
    }
}