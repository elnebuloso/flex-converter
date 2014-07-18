<?php
namespace Flex\Converter;

/**
 * Class ObjectToArray
 *
 * @package Flex\Converter
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ObjectToArray {

    /**
     * @param mixed $data
     * @return array
     */
    public function convert($data) {
        if(is_object($data)) {
            $data = get_object_vars($data);
        }

        if(is_array($data)) {
            return array_map(__METHOD__, $data);
        }
        else {
            return $data;
        }
    }
}