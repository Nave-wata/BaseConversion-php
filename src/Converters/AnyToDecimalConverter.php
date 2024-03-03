<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Converters;

use NaveWata\BaseConversion\Support\BCMath;
use NaveWata\BaseConversion\Support\Str;

class AnyToDecimalConverter extends ConcreteConverterContainer
{
    /**
     * Convert the given value to a decimal number.
     *
     * @param  string $number The number to be converted.
     * @return string The converted number.
     */
    public function convert(string $number): string
    {
        $weight = '1';
        $result = BCMath::ZERO;

        while (!empty($number)) {
            $result = bcadd($result, $this->lastCharToDecimal($number, $weight));
            $number = Str::removeLast($number);
            $weight = bcmul($weight, $this->anyBase);
        }

        return $result;
    }

    /**
     * Convert the last character of the given number to a decimal number.
     *
     * @param  string $number The number to be converted.
     * @param  string $weight The weight of the last character.
     * @return string The converted number.
     */
    private function lastCharToDecimal(string $number, string $weight): string
    {
        $lastChar = Str::getLast($number);

        $decimal = $this->charToDecimal($lastChar);

        return bcmul($decimal, $weight);
    }

    /**
     * Convert the given character to a decimal number.
     *
     * @param  string $char The character to be converted.
     * @return string The converted number.
     */
    private function charToDecimal(string $char): string
    {
        if (str_contains($this->baseChars, $char)) {
            return (string) strpos($this->baseChars, $char);
        }

        return $char;
    }
}
