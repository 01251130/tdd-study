<?php
class Dollar extends Money
{
    public function __construct(int $amount, string $currency) {
        parent::__construct($amount, $currency);
    }

    //memo:          関数の戻り値の型宣言もできる↓↓↓
    public function times(int $multiplier): Money
    {
        return Money::dollar($this->amount * $multiplier);
    }
}

