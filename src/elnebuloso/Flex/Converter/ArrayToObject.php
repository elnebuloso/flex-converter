<?php
namespace elnebuloso\Flex\Converter;

use stdClass;

/**
 * Class ArrayToObject
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ArrayToObject
{
    /**
     * convert array to object
     *
     * @param array $data
     * @return stdClass
     */
    public function convert($data)
    {
        if (is_array($data)) {
            if (!is_numeric(key($data))) {
                return (object) array_map(__METHOD__, $data);
            }

            /** @var stdClass $data */
            return $data;
        } else {
            /** @var stdClass $data */
            return $data;
        }
    }
}
