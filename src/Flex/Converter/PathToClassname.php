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
    public static function convert($string) {
        $parts = array();

        foreach(explode('/', trim($string, '/')) as $part) {
            $parts[] = ucfirst(StringToCamelCase::convert($part, '-'));
        }

        return implode('\\', $parts);
    }
}