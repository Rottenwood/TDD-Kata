<?php
/**
 * Author: Rottenwood
 * Date Created: 18.03.15 19:57
 */

namespace AppBundle\Calculator;

class Calculator
{
    public function add($numbersString = '')
    {

        $delimiter = '(,|\\\n)';

        if (preg_match('/' . $delimiter . '/', $numbersString)) {
            if (preg_match('/\/\/.?\\\n/', $numbersString)) {
                $delimiter = $numbersString[2];
                $numbersString = substr($numbersString, 5);
            }

            $numbers = preg_split('/' . $delimiter . '/', $numbersString);

            if (count($numbers) > 1) {
                return array_sum($numbers);
            } else {
                return (int)$numbers[0];
            }
        } else {
            return (int)$numbersString;
        }
    }
}

$calc = new Calculator();

//echo $calc->add('//;\n1;2');