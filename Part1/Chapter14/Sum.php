<?php

namespace Money;

use Money\Expression;
use Money\Money;
use Money\Bank;

class Sum implements Expression
{
    /** @var Money */
    private $augend;

    /** @var Money */
    private $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, string $toCurrency): Money
    {
        $amount = $this->augend->getAmount() + $this->addend->getAmount();
        return new Money($amount, $toCurrency);
    }

    public function getAugend(): Money
    {
        return $this->augend;
    }

    public function getAddend(): Money
    {
        return $this->addend;
    }
}
