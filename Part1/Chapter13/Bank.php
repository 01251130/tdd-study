<?php
namespace Money;
use Money\Money;

class Bank
{

    public function reduce(Expression $source, string $toCurrency) : Money
    {
        return $source->reduce($toCurrency);
    }
}
