<?php
namespace Flex\Converter;

use stdClass;

/**
 * Class ArrayToObject
 *
 * @package Flex\Converter
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ArrayToObject {

    /**
     * @param array $data
     * @return stdClass
     */
    public static function convert($data) {
        if(is_array($data)) {
            if(!is_numeric(key($data))) {
                return (object) array_map(__METHOD__, $data);
            }

            return $data;
        }
        else {
            return $data;
        }
    }
}