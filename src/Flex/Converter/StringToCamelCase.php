<?php
namespace Flex\Converter;

/**
 * Class StringToCamelCase
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class StringToCamelCase
{
    /**
     * convert string to camelcase
     *
     * @param string $string
     * @param string $delimiter
     * @return string
     */
    public function convert($string, $delimiter = '_')
    {
        $func = create_function('$c', 'return strtoupper($c[1]);');

        return preg_replace_callback('/[\s]+(.)/', $func, str_replace($delimiter, ' ', $string));
    }
}
