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

        // $product = $five->times(2);
        // memo: 同一クラス、同一引数のインスタンスであっても、オブジェクトが異なると===はFALSEになる。よってassertSameではなくassertEqualsを使用。
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue(Money::dollar(5)->equal(Money::dollar(5)));
        $this->assertFalse(Money::dollar(5)->equal(Money::dollar(6)));
        $this->assertTrue(Money::franc(5)->equal(Money::franc(5)));
        $this->assertFalse(Money::franc(5)->equal(Money::franc(6)));
        $this->assertFalse(Money::franc(5)->equal(Money::dollar(5)));
    }

    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));
        $this->assertEquals(Money::franc(15), $five->times(3));
    }

}
