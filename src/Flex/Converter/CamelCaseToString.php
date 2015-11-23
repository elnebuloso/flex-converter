<?php
namespace Flex\Converter;

/**
 * Class CamelCaseToString
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class CamelCaseToString
{
    /**
     * convert camel case string
     *
     * @param string $string
     * @param string $delimiter
     * @return mixed
     */
    public function convert($string, $delimiter = '_')
    {
        return preg_replace('/(?<=\\w)(?=[A-Z])/', "$delimiter$1", $string);
    }
}
