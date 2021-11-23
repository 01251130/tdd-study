<?php

namespace Money;

use Money\Money;
use Money\Pair;

class Bank
{

    /** @var array<Pair, int> */
    private $rates;

    /**
     * 為替レート登録
     *
     * @param string $from　変換前通貨
     * @param string $to　変換後通貨
     * @param integer $rate 為替レート
     * @return void
     */
    public function addRate(string $from, string $to, int $rate): void
    {
        $pair = new Pair($from, $to);
        $this->rates[$pair] = $rate;
    }

    public function reduce(Expression $source, string $toCurrency): Money
    {
        return $source->reduce($this, $toCurrency);
    }

    /**
     * 為替レートを返す
     *
     * @param string $from　変換前通貨
     * @param string $to　変換後通貨
     * @return integer 為替レート
     */
    public function rate(string $from, string $to): int
    {
        $pair = new Pair($from, $to);
        return $this->rates[$pair];
    }
}
