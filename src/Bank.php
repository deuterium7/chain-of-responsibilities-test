<?php

namespace AlexanderZabornyi\ChainOfResponsibilitiesTest;

class Bank extends Account
{
    protected $balance;

    /**
     * Bank constructor.
     *
     * @param float $balance
     */
    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}