<?php
namespace elnebuloso\Flex\Converter;

/**
 * Class Base64UrlDecode
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class Base64UrlDecode
{
    /**
     * @param string $string
     * @return string
     */
    public function convert($string)
    {
        return base64_decode(strtr($string, '-_,', '+/='));
    }
}
