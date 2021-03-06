<?php
namespace elnebuloso\Flex\Converter;

/**
 * Class NamespaceClassnameToPath
 *
 * @author Jeff Tunessen <jeff.tunessen@gmail.com>
 */
class NamespaceClassnameToPath
{
    /**
     * convert namespaced classname to path
     *
     * @param string $string
     * @return string
     */
    public function convert($string)
    {
        $parts = [];

        foreach (explode('\\', trim($string, '\\')) as $name) {
            $name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $name));
            $parts[] = $name;
        }

        return implode('/', $parts);
    }
}
