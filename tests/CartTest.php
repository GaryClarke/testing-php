<?php declare(strict_types=1);

namespace App\Tests;

use App\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    protected $cart;

    protected function setUp(): void
    {
        Cart::setTax(1.2);
        $this->cart = new Cart();
    }

    protected function tearDown(): void
    {
        // Cart::setTax(1.2);
    }

    public function testTheCartTaxValueCanBeChangedStatically()
    {
        // Setup
        $this->cart->setPrice(10);

        // Do something
        Cart::setTax(1.5);
        $netPrice = $this->cart->getNetPrice();

        // Make assertions
        $this->assertEquals(15, $netPrice);
    }

    public function testNetPriceIsCalculatedCorrectly()
    {
        // Setup
        $this->cart->setPrice(10);

        // Do something
        $netPrice = $this->cart->getNetPrice();

        // Make assertions
        $this->assertEquals(12, $netPrice);
    }

    public function testErrorHappensWhenPriceIsSetAsString()
    {
        $this->expectError();
        $this->expectErrorMessage('must be of type float');

        $this->cart->setPrice('5.99');
    }
    
}