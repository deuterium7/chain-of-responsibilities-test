<?php

namespace AlexanderZabornyi\ChainOfResponsibilitiesTest;

class Bitcoin extends Account
{
    protected $balance;

    /**
     * Bitcoin constructor.
     *
     * @param float $balance
     */
    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}