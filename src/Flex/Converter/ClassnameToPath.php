<?php
namespace Flex\Converter;

/**
 * Class ClassnameToPath
 *
 * @package Flex\Converter
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ClassnameToPath {

    /**
     * @param string $string
     * @return string
     */
    public static function convert($string) {
        $parts = array();

        foreach(explode('\\', $string) as $name) {
            $name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $name));
            $parts[] = $name;
        }

        return implode('/', $parts);
    }
}