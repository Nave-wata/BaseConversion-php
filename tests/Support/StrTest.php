<?php

namespace NaveWata\BaseConversion\Tests\Support;

use NaveWata\BaseConversion\Support\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    /**
     * testGetEndCharacter method tests the correctness of Str::getEndCharacter function.
     *
     *
     *  It uses a data provider that provides different strings.
     *  For each string, the expected output is the last character of the string.
     *  The method asserts that the result of Str::getEndCharacter is exactly the same as the expected result.
     *
     * @dataProvider getEndCharacterDataProvider
     * @covers ::getEndCharacter
     *
     * @param string $text
     * @param string $expected
     * @return void
     */
    public function testGetEndCharacter(string $text, string $expected): void
    {
        $this->assertSame($expected, Str::getLast($text));
    }

    /**
     * Data provider for testGetEndCharacter method.
     *
     * @return array
     */
    public function getEndCharacterDataProvider(): array
    {
        return [
            ['test', 't'],
            ['12345', '5'],
            ['empty', 'y'],
            ['phpunit', 't'],
            ['I am a test string', 'g'],
        ];
    }

    /**
     * It invokes the function with different input strings and compares the result with the expected output.
     *
     * - For an empty string, it expects an empty string.
     * - For a one-character string, it expects an empty string.
     * - For multiple characters string, it expects the input string minus the last character.
     *
     * @return void
     */
    public function testRemoveLastCharacter(): void
    {
        // Test empty string -> Expect empty string
        $this->assertSame('', Str::removeLast(''));

        // Test one-character string -> Expect empty string
        $this->assertSame('', Str::removeLast('x'));

        // Test multi-character string -> Expect input string minus last character
        $this->assertSame('foo', Str::removeLast('foox'));
    }
}
