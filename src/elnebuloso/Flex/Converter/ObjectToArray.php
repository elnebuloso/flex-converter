<?php
namespace elnebuloso\Flex\Converter;

/**
 * Class ObjectToArray
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class ObjectToArray
{
    /**
     * convert object to array
     *
     * @param mixed $data
     * @return array
     */
    public function convert($data)
    {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_array($data)) {
            return array_map(__METHOD__, $data);
        } else {
            return $data;
        }
    }
}
