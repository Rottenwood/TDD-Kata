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

        if (!(preg_match('/' . $delimiter . '/', $numbersString))) {
            return (int)$numbersString;
        }

        if (preg_match('/\/\/.?\\\n/', $numbersString)) {
            $delimiter = $numbersString[2];
            $numbersString = substr($numbersString, 5);
        }

        $numbers = preg_split('/' . $delimiter . '/', $numbersString);

        return array_sum($numbers);
    }
}

$calc = new Calculator();

//echo $calc->add('//;\n1;2');