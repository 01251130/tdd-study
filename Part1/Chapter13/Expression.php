<?php
namespace Money;

interface Expression
{
    public function reduce(string $toCurrency): Money;
}
