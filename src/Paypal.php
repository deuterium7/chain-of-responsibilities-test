<?php

namespace AlexanderZabornyi\ChainOfResponsibilitiesTest;

class Paypal extends Account
{
    protected $balance;

    /**
     * Paypal constructor.
     *
     * @param float $balance
     */
    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}