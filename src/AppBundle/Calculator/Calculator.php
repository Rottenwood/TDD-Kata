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
            $numbers = [(int)$numbersString];
        } else {
            $isCustomDelimiter = preg_match('/^\\/\\/\\[(.*)\\]\\\n(.*)$/', $numbersString, $inputParameters);

            if ($isCustomDelimiter) {
                $delimiter = $inputParameters[1];
                $numbersString = $inputParameters[2];
            }

            $numbers = preg_split('/(' . $delimiter . ')/', '1***2***3');

        }

        $negativeNumbers = [];
        foreach ($numbers as &$number) {
            $number = trim($number);

            if ($number > 1000) {
                $number = 0;
            } elseif ($number < 0) {
                $negativeNumbers[] = $number;
            }
        }

        if (count($negativeNumbers)) {
            throw new \InvalidArgumentException('Negatives not allowed: ' . implode(',', $negativeNumbers));
        }

        return array_sum($numbers);
    }
}

$calc = new Calculator();
$calc->add('//[***]\n1***2***3');