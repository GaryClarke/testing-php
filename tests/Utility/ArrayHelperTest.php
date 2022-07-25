<?php // tests/Utility/ArrayHelperTest.php

namespace App\Tests\Utility;

use App\Utility\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperTest extends TestCase
{

    /** @test */
    public function the_flatten_method_returns_a_flattened_array()
    {
        // Setup
        $array = [
            'key_one'    => 1,
            'key_two'    => 2,
            'nested_array' => [
                'key_three' => 3,
                'key_four'  => 4
            ]
        ];

        // Do something
        $flattenedArray = ArrayHelper::flatten($array);

        // Make assertions
        $this->assertEquals([
            'key_one'   => 1,
            'key_two'   => 2,
            'key_three' => 3,
            'key_four'  => 4
        ], $flattenedArray);
    }
}