<?php

namespace App\Tests;

use App\Cart;

class CartTest extends \PHPUnit\Framework\TestCase 
{

    protected $cart;

    protected function setUp(): void {
        Cart::setTax(1.2);
        $this->cart = new Cart();
    }


    public function testTheCartTaxValueCanBeChangedStatically(): void {

        //setup
        $this->cart->setPrice(10);

        //Do Something

        Cart::setTax(1.5);
        $netPrice = $this->cart->getNetPrice();

        //Make Assertions

        $this->assertEquals(15, $netPrice);
    }

    public function testNetPriceIsCalculatedCorrectly(): void
    {
        //setup
        $this->cart->setPrice(10);
        // do something

        $netPrice = $this->cart->getNetPrice();

        //Make assertions

        $this->assertEquals(12, $netPrice);
    }



}