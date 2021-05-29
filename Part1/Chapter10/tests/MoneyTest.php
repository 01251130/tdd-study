<?php
use PHPUnit\Framework\TestCase;
require_once(dirname(__FILE__)."/../Money.php");
require_once(dirname(__FILE__)."/../Dollar.php");
require_once(dirname(__FILE__)."/../Franc.php");

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
        $this->assertTrue(Money::franc(5)->equals(Money::franc(5)));
        $this->assertFalse(Money::franc(5)->equals(Money::franc(6)));
        $this->assertFalse(Money::franc(5)->equals(Money::dollar(5)));
    }

    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertTrue(Money::franc(10)->equals($five->times(2)));
        $this->assertTrue(Money::franc(15)->equals($five->times(3)));
    }

    public function testCurrency()
    {
        $this->assertSame('USD', Money::dollar(1)->currency());
        $this->assertSame('CHF', Money::franc(1)->currency());
    }

    public function testDifferentClassEquality()
    {
        $ten = new Money(10, 'CHF');
        $this->assertTrue($ten->equals(Money::franc(10)));
    }
}
