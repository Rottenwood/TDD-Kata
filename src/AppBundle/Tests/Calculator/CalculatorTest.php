<?php
/**
 * Author: Rottenwood
 * Date Created: 25.02.15 21:24
 */

namespace AppBundle\Tests\Calculator;

use AppBundle\Calculator\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{

    private $calculator;

    function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function testCalculateNull()
    {
        $result = $this->calculator->calculate();

        $this->assertEquals(0, $result);
    }

    public function testCalculateOneParameter()
    {
        $result = $this->calculator->calculate(1);

        $this->assertEquals(1, $result);
    }

    public function testCalculateTwoParameters()
    {
        $result = $this->calculator->calculate(1, 1.5);

        $this->assertEquals(2.5, $result);
    }

    public function testCalculateUnknownParameters()
    {
        $result = $this->calculator->calculate(1, 2, 3, 4, 5, 6, 7, 8, 9);

        $this->assertEquals(45, $result);
    }
}
