<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Converters;

use NaveWata\BaseConversion\Constants\BaseConsts;
use NaveWata\BaseConversion\Contracts\ConverterInterface;

class Converter implements ConverterInterface
{
    /**
     * The characters for the given base.
     *
     * @var string
     */
    private string $baseChars;

    /**
     * Create a new instance of the converter.
     *
     * @param  string $baseChars The characters for the given base.
     * @return void
     */
    public function __construct(string $baseChars = '')
    {
        $this->baseChars = $baseChars;
    }

    /**
     * Convert the given number from one base to another.
     *
     * @param  string $number The number to be converted.
     * @param  int $fromBase The base to convert from.
     * @param  int $toBase The base to convert to.
     * @return string The converted number.
     */
    public function convert(string $number, int $fromBase, int $toBase): string
    {
        if ($fromBase !== BaseConsts::DECIMAL_BASE) {
            $number = (new AnyToDecimalConverter($fromBase, $this->baseChars))->convert($number);
        }

        if ($toBase === BaseConsts::DECIMAL_BASE) {
            return $number;
        }

        return (new DecimalToAnyConverter($toBase, $this->baseChars))->convert($number);
    }
}
