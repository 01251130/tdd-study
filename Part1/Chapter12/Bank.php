<?php
namespace Money;
use Money\Money;

class Bank
{

    public function reduce() : Money
    {
        return Money::dollar(10);
    }
}
