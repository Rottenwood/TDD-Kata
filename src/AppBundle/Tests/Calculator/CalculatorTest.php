<?php
/**
 * Author: Rottenwood
 * Date Created: 04.03.15 20:27
 */

namespace AppBundle\Calculator;

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

    /**
     * @test
     */
    public function add_ChangeDelimeterOption_ReturnSummOfNumbers()
    {
        assertThat($this->calculator->add('//;\n1;2'), is(equalTo(3)));
    }

    /**
     * @test
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage Negatives not allowed
     */
    public function add_NegativeNumbersNotAllowed_ThrowException()
    {
        $this->calculator->add('-10');
    }
}
