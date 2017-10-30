<?php

namespace AlexanderZabornyi\ChainOfResponsibilitiesTest;

use PHPUnit\Runner\Exception;

abstract class Account
{
    protected $successor;
    protected $balance;

    /**
     * Установить следующий способ оплаты
     *
     * @param Account $account
     */
    public function setNext(Account $account)
    {
        $this->successor = $account;
    }

    /**
     * Произвести покупку
     *
     * @param float $amountToPay
     *
     * @return string
     */
    public function pay(float $amountToPay)
    {
        if ($this->canPay($amountToPay)) {
            return sprintf('Paid %s using %s', $amountToPay, get_called_class());
        } elseif ($this->successor) {
            return $this->successor->pay($amountToPay);
        } else {
            throw new Exception('None of the accounts have enough balance');
        }
    }

    /**
     * Покупка возможна?
     *
     * @param float $amount
     *
     * @return bool
     */
    public function canPay(float $amount): bool
    {
        return $this->balance >= $amount;
    }
}