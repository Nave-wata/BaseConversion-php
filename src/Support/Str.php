<?php

declare(strict_types=1);

namespace NaveWata\BaseConversion\Support;

class Str
{
    /**
     * Represents the first offset of a string.
     *
     * @var int
     */
    public const FIRST_OFFSET = 0;

    /**
     * Represents the last offset of a string.
     *
     * @var int
     */
    public const LAST_OFFSET = -1;

    /**
     * Get the first character of the provided string.
     *
     * @param  string $text The string to get the first character from.
     * @return string The first character of the provided string.
     */
    public static function getFirst(string $text): string
    {
        return $text[self::FIRST_OFFSET];
    }

    /**
     * Get the last character of the provided string.
     *
     * @param  string $text The string to get the last character from.
     * @return string The last character of the provided string.
     */
    public static function getLast(string $text): string
    {
        return substr($text, self::LAST_OFFSET);
    }

    /**
     * Returns the text excluding the last character of the provided string.
     *
     * @param  string $text The string to remove the last character from.
     * @return string The text excluding the last character.
     */
    public static function removeLast(string $text): string
    {
        return substr($text, self::FIRST_OFFSET, self::LAST_OFFSET);
    }
}
