<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Converters;

use NaveWata\BaseConversion\Support\BCMath;
use NaveWata\BaseConversion\Support\Str;

class DecimalToAnyConverter extends ConcreteConverterContainer
{
    /**
     * Convert the given value to a number of any base.
     *
     * @param  string $number The number to be converted.
     * @return string The converted number.
     */
    public function convert(string $number): string
    {
        $result = '';

        while ($this->graterThenZero($number)) {
            $result = $this->toBaseChar($number) . $result;
            $number = bcdiv($number, $this->anyBase, BCMath::SCALE_FOR_INT_DIVISION);
        }

        return $this->resultOrZero($result);
    }

    /**
     * Convert the given decimal number to a base character.
     *
     * @param  string $number The number to be converted.
     * @return string The converted number.
     */
    private function toBaseChar(string $number): string
    {
        $index = (int) bcmod($number, $this->anyBase);

        return $this->baseChars[$index];
    }

    /**
     * Return the result or zero if the result is empty.
     *
     * If there is a custom base conversion string, the first value of that will be zero.
     *
     * @param  string $result The result of the conversion.
     * @return string The result or zero if the result is empty.
     */
    private function resultOrZero(string $result): string
    {
        if (!empty($result)) {
            return $result;
        }

        if (empty($this->baseChars)) {
            return BCMath::ZERO;
        }

        return Str::getFirst($this->baseChars);
    }

    /**
     * Check if the given decimal number is greater than zero.
     *
     * @param  string $decimal The decimal number to be checked.
     * @return bool True if the decimal number is greater than zero, false otherwise.
     */
    private function graterThenZero(string $decimal): bool
    {
        return BCMath::greaterThen($decimal, '0');
    }
}
