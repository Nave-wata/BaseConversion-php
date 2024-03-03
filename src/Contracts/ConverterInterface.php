<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Contracts;

interface ConverterInterface
{
    /**
     * Converts the given number to the specified radix.
     *
     * @param  string $number The number to be converted.
     * @param  int $fromBase The base of the number to be converted.
     * @param  int $toBase The base to convert the number to.
     * @return string The converted number.
     */
    public function convert(string $number, int $fromBase, int $toBase): string;
}
