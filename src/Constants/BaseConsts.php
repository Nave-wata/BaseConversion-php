<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Constants;

class BaseConsts
{
    /**
     * The BASE_2 constant is used to represent the binary number base.
     *
     * @var int
     */
    public const BINARY_BASE = -2;

    /**
     * The BASE_10 constant is used to represent the decimal number base.
     *
     * @var int
     */
    public const DECIMAL_BASE = -10;

    /**
     * The BASE_16 constant is used to represent the hexadecimal number base.
     *
     * @var int
     */
    public const HEXADECIMAL_BASE = -16;

    /**
     * The BINARY_CHARS constant defines the characters allowed in a binary number representation.
     *
     * @var string
     */
    public const BINARY_CHARS = '01';

    /**
     * The DECIMAL_CHARS constant defines the characters allowed in a decimal number representation.
     *
     * @var string
     */
    public const DECIMAL_CHARS = '0123456789';

    /**
     * The HEXADECIMAL_CHARS constant defines the characters allowed in a hexadecimal number representation.
     *
     * @var string
     */
    public const HEXADECIMAL_CHARS = '0123456789ABCDEF';

    /**
     * The PREPARED_BASES constant is an array that contains the prepared bases for conversion.
     *
     * @var array
     */
    public const PREPARED_BASES = [
        self::BINARY_BASE       => self::BINARY_CHARS,
        self::DECIMAL_BASE      => self::DECIMAL_CHARS,
        self::HEXADECIMAL_BASE  => self::HEXADECIMAL_CHARS,
    ];
}
