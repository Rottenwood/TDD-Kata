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
            if (preg_match('/\/\/.?\\\n/', $numbersString)) {
                $delimiter = $numbersString[2];
                $numbersString = substr($numbersString, 5);
            }

            $numbers = preg_split('/' . $delimiter . '/', $numbersString);
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
