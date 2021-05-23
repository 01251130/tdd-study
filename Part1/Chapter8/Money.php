<?php
abstract class Money
{
    protected int $amount = 0;
    // memo: abstractは、メソッド宣言のみ。中身は子クラスで定義する。
    abstract protected function times(int $multiplier):Money;

    public function equal(Money $money):bool
    {
        // クラス比較もしないと、DollarとFrancの比較がTRUEになってしまう
        return ($this->amount === $money->amount)
            && (get_class($this) === get_class($money));
    }

    public static function dollar(int $amount):Money
    {
        // memo: インスタンス生成せずに、メソッドでオブジェクト生成する方法をFactory Methodという
        return new Dollar($amount);
    }

    public static function franc(int $amount):Money
    {
        return new Franc($amount);
    }

}

