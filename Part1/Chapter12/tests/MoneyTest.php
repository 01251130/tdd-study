<?php
require_once(dirname(__FILE__)."/../Expression.php");
require_once(dirname(__FILE__)."/../Money.php");
require_once(dirname(__FILE__)."/../Bank.php");

use PHPUnit\Framework\TestCase;
use Money\Money;
use Money\Bank;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        // memo: スコープ定義演算子(::)は、クラスのプロパティとメソッドにアクセスする
        // memo: アロー演算子(->)は、インスタンスのプロパティとメソッドにアクセスする
        $five = Money::dollar(5);
        $this->assertTrue(Money::dollar(10)->equals($five->times(2)));
        $this->assertTrue(Money::dollar(15)->equals($five->times(3)));
    }

    public function testEquality()
    {
        $this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        $this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
        $this->assertFalse(Money::franc(5)->equals(Money::dollar(5)));
    }

    public function testCurrency()
    {
        $this->assertSame('USD', Money::dollar(1)->currency());
        $this->assertSame('CHF', Money::franc(1)->currency());
    }

    public function test_simpleAddition_同一通貨の足し算()
    {
        // 足し算
        $five = Money::dollar(5);
        /** @var Expression */
        $sum = $five->plus($five);

        // 通貨変換
        $bank = new Bank();
        /** @var Money */
        $reduced = $bank->reduce($sum, 'USD');

        $this->assertEquals(Money::dollar(10), $reduced);

    }
}
