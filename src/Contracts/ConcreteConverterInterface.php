<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Contracts;

interface ConcreteConverterInterface
{
    /**
     * Convert the given value to a decimal number.
     *
     * @param  string $number The number to be converted.
     * @return string The converted number.
     */
    public function convert(string $number): string;
}
