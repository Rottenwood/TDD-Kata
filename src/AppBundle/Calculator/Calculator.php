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
            $result = (int)$numbersString;
            $this->checkNegative($result);
        } else {
            if (preg_match('/\/\/.?\\\n/', $numbersString)) {
                $delimiter = $numbersString[2];
                $numbersString = substr($numbersString, 5);
            }

            $numbers = preg_split('/' . $delimiter . '/', $numbersString);
            $this->checkNegative($numbers);
            $result = array_sum($numbers);
        }

        return $result;
    }

    /**
     * @param array|int $numbers
     */
    private function checkNegative($numbers)
    {
        if (is_array($numbers)) {
            foreach ($numbers as $number) {
                if ($number < 0) {
                    throw new \InvalidArgumentException('Negatives not allowed');
                }
            }
        } elseif ($numbers < 0) {
            throw new \InvalidArgumentException('Negatives not allowed');
        }
    }
}
