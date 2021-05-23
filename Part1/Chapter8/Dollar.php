<?php
class Dollar extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    //memo:          関数の戻り値の型宣言もできる↓↓↓
    public function times(int $multiplier): Money
    {
        return new Dollar($this->amount * $multiplier);
    }
}

