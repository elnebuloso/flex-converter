<?php
namespace Flex\Converter;

/**
 * Class Base64UrlEncode
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class Base64UrlEncode
{

    /**
     * @param string $string
     * @return string
     */
    public function convert($string)
    {
        return strtr(base64_encode($string), '+/=', '-_,');
    }
}
