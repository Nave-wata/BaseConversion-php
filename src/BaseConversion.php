<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion;

use NaveWata\BaseConversion\Constants\BaseConsts;
use NaveWata\BaseConversion\Contracts\ConverterInterface;
use NaveWata\BaseConversion\Converters\Converter;

class BaseConversion
{
    /**
     * The base characters for custom base conversion.
     *
     * @var string
     */
    private string $baseChars;

    /**
     * The converter instance.
     *
     * @var ConverterInterface
     */
    private ConverterInterface $converter;

    /**
     * Create a new BaseConversion instance.
     *
     * @param string $baseChars The base characters for custom base conversion. Default is an empty string.
     */
    public function __construct(string $baseChars = '')
    {
        $this->makeConverter($baseChars);
    }

    /**
     * Create a new instance of the converter.
     *
     * @param  string $baseChars The characters for the given base.
     * @return void
     */
    public function makeConverter(string $baseChars = ''): void
    {
        $this->baseChars = $baseChars;
        $this->converter = new Converter($baseChars);
    }

    /**
     * Method to convert custom base to decimal.
     *
     * @param  string $number The custom base number to be converted.
     * @return string The decimal value.
     */
    public function customToDecimal(string $number): string
    {
        return $this->converter->convert($number, strlen($this->baseChars), BaseConsts::DECIMAL_BASE);
    }

    /**
     * Method to convert decimal to custom base.
     *
     * @param  string $number The decimal number to be converted.
     * @return string The custom base value.
     */
    public function decimalToCustom(string $number): string
    {
        return $this->converter->convert($number, BaseConsts::DECIMAL_BASE, strlen($this->baseChars));
    }

    /**
     * Method to convert binary to decimal.
     *
     * @param  string $binary The binary number to be converted.
     * @return string The decimal value.
     */
    public static function binaryToDecimal(string $binary): string
    {
        return (new Converter())->convert($binary, BaseConsts::BINARY_BASE, BaseConsts::DECIMAL_BASE);
    }

    /**
     * Method to convert binary to hexadecimal.
     *
     * @param  string $binary The binary number to be converted.
     * @return string The hexadecimal value.
     */
    public static function binaryToHexadecimal(string $binary): string
    {
        return (new Converter())->convert($binary, BaseConsts::BINARY_BASE, BaseConsts::HEXADECIMAL_BASE);
    }

    /**
     * Method to convert decimal to binary.
     *
     * @param  string $decimal The decimal number to be converted.
     * @return string The binary value.
     */
    public static function decimalToBinary(string $decimal): string
    {
        return (new Converter())->convert($decimal, BaseConsts::DECIMAL_BASE, BaseConsts::BINARY_BASE);
    }

    /**
     * Method to convert decimal to hexadecimal.
     *
     * @param  string $decimal The decimal number to be converted.
     * @return string The hexadecimal value.
     */
    public static function decimalToHexadecimal(string $decimal): string
    {
        return (new Converter())->convert($decimal, BaseConsts::DECIMAL_BASE, BaseConsts::HEXADECIMAL_BASE);
    }

    /**
     * Method to convert hexadecimal to binary.
     *
     * @param  string $hexadecimal The hexadecimal number to be converted.
     * @return string The binary value.
     */
    public static function hexadecimalToBinary(string $hexadecimal): string
    {
        return (new Converter())->convert($hexadecimal, BaseConsts::HEXADECIMAL_BASE, BaseConsts::BINARY_BASE);
    }

    /**
     * Method to convert hexadecimal to decimal.
     *
     * @param  string $hexadecimal The hexadecimal number to be converted.
     * @return string The decimal value.
     */
    public static function hexadecimalToDecimal(string $hexadecimal): string
    {
        return (new Converter())->convert($hexadecimal, BaseConsts::HEXADECIMAL_BASE, BaseConsts::DECIMAL_BASE);
    }
}
