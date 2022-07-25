<?php // src/Utility/ArrayHelper.php

namespace App\Utility;

class ArrayHelper
{
    public static function flatten(array $array): array
    {
        return iterator_to_array(
            new \RecursiveIteratorIterator(new \RecursiveArrayIterator($array)));
    }
}