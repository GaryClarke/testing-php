<?php

namespace App\Tests;

require 'example-functions.php';

use App\Cart;

class ExampleTest extends \PHPUnit\Framework\TestCase
{

    public function testTwoStringsAreTheSame()
    {
        $string1 = 'garyclarketech';
        $string2 = 'garyclarketek';

        $this->assertFalse($string1 == $string2);
    }

    public function testProductIsCalculatedCorrectly()
    {
        $product = product(10, 2);

        $this->assertEquals(20, $product);
        $this->assertNotEquals(10, $product);
    }

    /**
     * @dataProvider quotientProvider
     */
    public function testQuotientIsCalculatedCorrectly($a, $b, $expected)
    {
        $quotient = quotient($a, $b);

        $this->assertSame($expected, $quotient);
    }


    public function quotientProvider(): array
    {
        return [
            '9_by_3' => [9, 3, 3],
            '72_by_9' => [72, 9, 8],
            'division_by_zero' => [20, 0, 20],
        ];
    }








    public function testSomeAssertions()
    {
        // Demo static v $this
//        $this->assertFalse(2 == 1);

        // assertArrayHasKey
        $testArray = ['foo' => 'bar'];
        $this->assertArrayHasKey('foo', $testArray);

        $this->assertArrayNotHasKey('zoo', $testArray);

        // assertContains
        $this->assertContains('bar', $testArray);

        $this->assertNotContains('baz', $testArray);

        // assertStringContainsString
        $string = json_encode([
            'price' => '8.99',
            'date'  => '2021-12-04',
        ]);

        $this->assertStringContainsString('"date":"2021-12-04"', $string);

        // assertInstanceOf
        $cart = new Cart();
        $this->assertInstanceOf(Cart::class, $cart);

        // assertCount
        $this->assertCount(5, [1, 2, 3, 4, 5]);

        // assertEquals / assertSame
        $value = 21;
//        $this->assertSame(1, $value);

        // assertGreaterThan (or equal)
//        $this->assertGreaterThanOrEqual(22, $value);

        // assertIsArray
        $this->assertFalse(is_array(321),
            'Failed asserting that 321 is an array');

        $this->assertEquals('localhost', URL);

    }


}