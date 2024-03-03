<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Converters;

use InvalidArgumentException;
use NaveWata\BaseConversion\Constants\BaseConsts;
use NaveWata\BaseConversion\Contracts\ConcreteConverterInterface;

abstract class ConcreteConverterContainer implements ConcreteConverterInterface
{
    /**
     * User defined radix
     *
     * @var string
     */
    protected string $anyBase;

    /**
     * User defined base characters
     *
     * @var string
     */
    protected string $baseChars;

    /**
     * Create a new instance of the converter.
     *
     * @param  int $anyBase The base to use for conversion.
     * @param  string $baseChars The characters for the given base.
     * @return void
     */
    public function __construct(int $anyBase, string $baseChars)
    {
        $this->anyBase      = $this->toStringPositiveNumber($anyBase);
        $this->baseChars    = $this->getBaseChars($baseChars, $anyBase);
    }

    /**
     * 2, 10, hexadecimal numbers are assumed to be constants with negative values, so convert them to positive values
     *
     * BCMath functions are used to calculate the value, so it is returned as a string after conversion
     *
     * @param  int $number The number to be converted.
     * @return string The converted number.
     */
    private function toStringPositiveNumber(int $number): string
    {
        return (string) abs($number);
    }

    /**
     * Identify the characters used in a particular base.
     *
     * @param  string $baseChars The provided base characters.
     * @param  int $base The base to use for conversion.
     * @return string The characters for the given base.
     *
     * @throws InvalidArgumentException If the base characters are not provided for custom base conversion.
     */
    private function getBaseChars(string $baseChars, int $base): string
    {
        if (empty($baseChars) && isset(BaseConsts::PREPARED_BASES[$base])) {
            $baseChars = BaseConsts::PREPARED_BASES[$base];
        }

        if (empty($baseChars)) {
            throw new InvalidArgumentException('The base characters must be provided for custom base conversion.');
        }

        return $baseChars;
    }
}
