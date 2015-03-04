<?php
/**
 * Author: Rottenwood
 * Date Created: 04.03.15 20:27
 */

namespace AppBundle\Tests\Calculator;


class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator;
    }

    /**
     * @test
     */
    public function add_EmptyString_ReturnsZero()
    {
        assertThat($this->calculator->add(''), is(identicalTo(0)));
    }

    /**
     * @test
     */
    public function add_SingleNumber_ReturnsThatNumber()
    {
        assertThat($this->calculator->add('1'), is(equalTo(1)));
        assertThat($this->calculator->add('2'), is(equalTo(2)));
    }

    /**
     * @test
     */
    public function add_TwoNumbers_ReturnsSummOfAllNumbers()
    {
        assertThat($this->calculator->add('1,2'), is(equalTo(3)));
    }

    /**
     * @test
     */
    public function add_ThreeNumbers_ReturnSummOfNumbers()
    {
        assertThat($this->calculator->add('1,2,3'), is(equalTo(6)));
    }

    /**
     * @test
     */
    public function add_NewLinesInsteadOfCommas_ReturnSummOfNumbers()
    {
        assertThat($this->calculator->add('1\n2,3'), is(equalTo(6)));
    }
}

class Calculator
{
    public function add($numbersString)
    {
        $numbers = preg_split('/(,|\\\n)/', $numbersString);

        if (count($numbers) > 1) {
            return array_sum($numbers);
        } else {
            return (int)$numbers[0];
        }
    }
}
