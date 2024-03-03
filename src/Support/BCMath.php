<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Support;

class BCMath
{
    /**
     * Represents the zero value.
     *
     * @var string ZERO
     */
    public const ZERO = '0';

    /**
     * Represents the scale value to be used for integer division.
     *
     * Integer division in PHP by default returns an integer value, truncating any decimal places.
     * By setting this constant value to 0, it ensures that integer division is performed without any decimal places.
     *
     * @var int
     */
    public const SCALE_FOR_INT_DIVISION = 0;

    /**
     * Represents the equality comparison result of two values.
     *
     * The value of COMP_EQUAL is used to indicate that two values are equal.
     *
     * @var int
     */
    public const COMP_EQUAL = 0;

    /**
     * Represents a comparison greater than value.
     *
     * @var int
     */
    public const COMP_GREATER_THEN = 1;

    /**
     * Represents a comparison less than value.
     *
     * @var int
     */
    public const COMP_LESS_THEN = -1;

    /**
     * Checks if two numbers are equal.
     *
     * @param  string $num1 The first number.
     * @param  string $num2 The second number.
     * @return bool Returns true if the numbers are equal, false otherwise.
     */
    public static function equal(string $num1, string $num2): bool
    {
        return bccomp($num1, $num2) === self::COMP_EQUAL;
    }

    /**
     * Determines if one numeric string is greater than another.
     *
     * @param  string $num1 The first numeric string.
     * @param  string $num2 The second numeric string.
     * @return bool True if $num1 is greater than $num2, false otherwise.
     */
    public static function greaterThen(string $num1, string $num2): bool
    {
        return bccomp($num1, $num2) === self::COMP_GREATER_THEN;
    }

    /**
     * Compares two numbers and determines if the first number is less than the second number.
     *
     * @param  string $num1 The first number to compare.
     * @param  string $num2 The second number to compare.
     * @return bool Returns true if the first number is less than the second number, false otherwise.
     */
    public static function lessThen(string $num1, string $num2): bool
    {
        return bccomp($num1, $num2) === self::COMP_LESS_THEN;
    }
}
