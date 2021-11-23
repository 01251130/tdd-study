<?php
namespace Money;
use Money\Expression;
use Money\Sum;

class Money implements Expression
{
    protected int $amount = 0;
    protected string $currency;
    // memo: abstractな関数は、abstractなクラスにしか存在できない
    // abstract protected function times(int $multiplier):Money;

    public function __construct(int $amount, ?string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function plus(Money $addend): Expression
    {
        // memo: 自分自身を引数として渡したい場合は、$thisを使う
        return new Sum($this, $addend);
    }

    public function reduce(string $toCurrency): Money
    {
        return $this;
    }

    public function equals(Money $money):bool
    {
        // クラス比較ではなく、currencyを比較するよう変更
        return ($this->amount === $money->amount)
            && ($this->currency === $money->currency);
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public static function dollar(int $amount):Money
    {
        // memo: インスタンス生成せずに、メソッドでオブジェクト生成する方法をFactory Methodという
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount):Money
    {
        return new Money($amount, 'CHF');
    }

    // memo: __から始まるのはマジックメソッドという。
    // メソッド名指定で呼び出されることはなく、ある状況において実行される。
    // __toStringは、インスタンスを文字列として扱いたい場合に利用される。
    public function __toString()
    {
        return $this->amount.' '.$this->currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}

