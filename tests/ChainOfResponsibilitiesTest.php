<?php

namespace AlexanderZabornyi\ChainOfResponsibilitiesTest\Tests;

use AlexanderZabornyi\ChainOfResponsibilitiesTest\Bank;
use AlexanderZabornyi\ChainOfResponsibilitiesTest\Bitcoin;
use AlexanderZabornyi\ChainOfResponsibilitiesTest\Paypal;
use PHPUnit\Framework\TestCase;

class ChainOfResponsibilitiesTest extends TestCase
{
    public function testChainOfResponsibilities()
    {
        $bank = new Bank(100);
        $paypal = new Paypal(200);
        $bitcoin = new Bitcoin(300);

        $bank->setNext($paypal);
        $paypal->setNext($bitcoin);

        $this->assertEquals(
            'Paid 76 using AlexanderZabornyi\ChainOfResponsibilitiesTest\Bank',
            $bank->pay(76)
        );
        $this->assertEquals(
            'Paid 137 using AlexanderZabornyi\ChainOfResponsibilitiesTest\Paypal',
            $bank->pay(137)
        );
        $this->assertEquals(
            'Paid 259 using AlexanderZabornyi\ChainOfResponsibilitiesTest\Bitcoin',
            $bank->pay(259)
        );
    }
}