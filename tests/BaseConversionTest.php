<?php

namespace NaveWata\tests;

use NaveWata\BaseConversion\BaseConversion;
use PHPUnit\Framework\TestCase;

class BaseConversionTest extends TestCase
{

    /**
     * @var BaseConversion
     */
    private BaseConversion $baseConversion;

    /**
     * Set up the test environment before each test method is executed.
     *
     * This method is called automatically before each test method is executed, providing
     * an opportunity to initialize any necessary objects or configuration needed for
     * the tests.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->baseConversion = new BaseConversion();
    }

    /**
     * Test the custom conversion functionality.
     *
     * This method tests the custom conversion functionality of the BaseConversion class.
     * It initializes a BaseConversion object with a custom base character string.
     * It asserts that the conversion from custom base to decimal and from decimal to custom base yields the expected results.
     *
     * @return void
     */
    public function testCustomConversion(): void
    {
        $baseCharsList = [
            '0123456789',
            'ABCDEFGHIJ',
            '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
        ];

        foreach ($baseCharsList as $baseChars) {
            $baseCharsLength = strlen($baseChars);
            $baseConversion = new BaseConversion($baseChars);

            for ($i = 0; $i < $baseCharsLength; $i++) {
                $this->assertEquals($baseChars[$i], $baseConversion->decimalToCustom($i));
                $this->assertEquals($i, $baseConversion->customToDecimal($baseChars[$i]));
            }

            for ($i = $baseCharsLength; $i < $baseCharsLength * 2; $i++) {
                $this->assertEquals($baseChars[1] . $baseChars[$i - $baseCharsLength], $baseConversion->decimalToCustom($i));
                $this->assertEquals($i, $baseConversion->customToDecimal($baseChars[1] . $baseChars[$i - $baseCharsLength]));
            }
        }
    }

    /**
     * Test the binaryToDecimal method.
     *
     * This method tests the conversion of a binary number to decimal.
     * Test that both static and dynamic method calls are possible.
     *
     * @return void
     */
    public function testBinaryToDecimal(): void
    {
        $this->assertEquals('0', $this->baseConversion::binaryToDecimal('0'));
        $this->assertEquals('2', $this->baseConversion::binaryToDecimal('10'));
        $this->assertEquals('15', $this->baseConversion::binaryToDecimal('1111'));
        $this->assertEquals('1234', $this->baseConversion::binaryToDecimal('10011010010'));

        $this->assertEquals('0', BaseConversion::binaryToDecimal('0'));
        $this->assertEquals('2', BaseConversion::binaryToDecimal('10'));
        $this->assertEquals('15', BaseConversion::binaryToDecimal('1111'));
        $this->assertEquals('1234', BaseConversion::binaryToDecimal('10011010010'));
    }

    /**
     * Test the decimalToBinary method.
     *
     * This method tests the conversion of a decimal number to binary.
     * Test that both static and dynamic method calls are possible.
     *
     * @return void
     */
    public function testDecimalToBinary(): void
    {
        $this->assertEquals('0', $this->baseConversion::decimalToBinary('0'));
        $this->assertEquals('10', $this->baseConversion::decimalToBinary('2'));
        $this->assertEquals('1111', $this->baseConversion::decimalToBinary('15'));
        $this->assertEquals('10011010010', $this->baseConversion::decimalToBinary('1234'));

        $this->assertEquals('0', BaseConversion::decimalToBinary('0'));
        $this->assertEquals('10', BaseConversion::decimalToBinary('2'));
        $this->assertEquals('1111', BaseConversion::decimalToBinary('15'));
        $this->assertEquals('10011010010', BaseConversion::decimalToBinary('1234'));
    }

    /**
     * Test the decimalToHexadecimal method.
     *
     * This method tests the conversion of a decimal number to hexadecimal.
     * Test that both static and dynamic method calls are possible.
     *
     * @return void
     */
    public function testDecimalToHexadecimal(): void
    {
        $this->assertEquals('0', $this->baseConversion::decimalToHexadecimal('0'));
        $this->assertEquals('A', $this->baseConversion::decimalToHexadecimal('10'));
        $this->assertEquals('F', $this->baseConversion::decimalToHexadecimal('15'));
        $this->assertEquals('4D2', $this->baseConversion::decimalToHexadecimal('1234'));

        $this->assertEquals('0', BaseConversion::decimalToHexadecimal('0'));
        $this->assertEquals('A', BaseConversion::decimalToHexadecimal('10'));
        $this->assertEquals('F', BaseConversion::decimalToHexadecimal('15'));
        $this->assertEquals('4D2', BaseConversion::decimalToHexadecimal('1234'));
    }

    /**
     * Test the binaryToHexadecimal method.
     *
     * This method tests the conversion of a binary number to hexadecimal.
     * Test that both static and dynamic method calls are possible.
     *
     * @return void
     */
    public function testBinaryToHexadecimal(): void
    {
        $this->assertEquals('0', $this->baseConversion::binaryToHexadecimal('0'));
        $this->assertEquals('A', $this->baseConversion::binaryToHexadecimal('1010'));
        $this->assertEquals('F', $this->baseConversion::binaryToHexadecimal('1111'));
        $this->assertEquals('4D2', $this->baseConversion::binaryToHexadecimal('10011010010'));

        $this->assertEquals('0', BaseConversion::binaryToHexadecimal('0'));
        $this->assertEquals('A', BaseConversion::binaryToHexadecimal('1010'));
        $this->assertEquals('F', BaseConversion::binaryToHexadecimal('1111'));
        $this->assertEquals('4D2', BaseConversion::binaryToHexadecimal('10011010010'));
    }

    /**
     * Test the hexadecimalToBinary method.
     *
     * This method tests the conversion of a hexadecimal number to binary.
     * Test that both static and dynamic method calls are possible.
     *
     * @return void
     */
    public function testHexadecimalToBinary(): void
    {
        $this->assertEquals('0', $this->baseConversion::hexadecimalToBinary('0'));
        $this->assertEquals('1111', $this->baseConversion::hexadecimalToBinary('F'));
        $this->assertEquals('10011010010', $this->baseConversion::hexadecimalToBinary('4D2'));
        $this->assertEquals('1111111111111111', $this->baseConversion::hexadecimalToBinary('FFFF'));

        $this->assertEquals('0', BaseConversion::hexadecimalToBinary('0'));
        $this->assertEquals('1111', BaseConversion::hexadecimalToBinary('F'));
        $this->assertEquals('10011010010', BaseConversion::hexadecimalToBinary('4D2'));
        $this->assertEquals('1111111111111111', BaseConversion::hexadecimalToBinary('FFFF'));
    }

    /**
     * Test the hexadecimalToDecimal method.
     *
     * This method tests the conversion of a hexadecimal number to decimal.
     * Test that both static and dynamic method calls are possible.
     *
     * @return void
     */
    public function testHexadecimalToDecimal(): void
    {
        $this->assertEquals('0', $this->baseConversion::hexadecimalToDecimal('0'));
        $this->assertEquals('10', $this->baseConversion::hexadecimalToDecimal('A'));
        $this->assertEquals('15', $this->baseConversion::hexadecimalToDecimal('F'));
        $this->assertEquals('1234', $this->baseConversion::hexadecimalToDecimal('4D2'));

        $this->assertEquals('0', BaseConversion::hexadecimalToDecimal('0'));
        $this->assertEquals('10', BaseConversion::hexadecimalToDecimal('A'));
        $this->assertEquals('15', BaseConversion::hexadecimalToDecimal('F'));
        $this->assertEquals('1234', BaseConversion::hexadecimalToDecimal('4D2'));
    }
}
