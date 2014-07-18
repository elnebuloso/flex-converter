<?php
namespace Flex\Converter;

/**
 * Class CamelCaseToString
 *
 * @package Flex\Converter
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class CamelCaseToString {

    /**
     * @param string $string
     * @param string $delimiter
     * @return mixed
     */
    public function convert($string, $delimiter = '_') {
        return preg_replace('/(?<=\\w)(?=[A-Z])/', "$delimiter$1", $string);
    }
}