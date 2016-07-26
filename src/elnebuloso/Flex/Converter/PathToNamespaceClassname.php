<?php
namespace elnebuloso\Flex\Converter;

/**
 * Class PathToNamespaceClassname
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class PathToNamespaceClassname
{
    /**
     * convert path to namespaced classname
     *
     * @param string $string
     * @return string
     */
    public function convert($string)
    {
        $stringToCamelCase = new StringToCamelCase();
        $parts = [];

        foreach (explode('/', trim($string, '/')) as $part) {
            $parts[] = ucfirst($stringToCamelCase->convert($part, '-'));
        }

        return implode('\\', $parts);
    }
}
