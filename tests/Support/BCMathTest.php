<?php

namespace NaveWata\BaseConversion\Tests\Support;

use NaveWata\BaseConversion\Support\BCMath;
use PHPUnit\Framework\TestCase;

/**
 * Class BCMathTest
 *
 * This class contains the unit tests for the BCMath class methods.
 */
class BCMathTest extends TestCase
{
    /**
     * This test case asserts that the `equal` method correctly identifies equal numbers.
     * Two same numeric strings are passed as parameters and expects the method to return
     * true stating that the two numbers are equal.
     */
    public function testEqualWithEqualValues(): void
    {
        $this->assertTrue(BCMath::equal('123', '123'));
    }

    /**
     * This test case asserts that the `equal` method correctly identifies unequal numbers.
     * Two different numeric strings are passed as parameters and expects the method to return
     * false stating that the two numbers are not equal.
     */
    public function testEqualWithDifferentValues(): void
    {
        $this->assertFalse(BCMath::equal('123', '456'));
    }

    /**
     * Tests the `greaterThen` method in the `BCMath` class.
     */
    public function testGreaterThen(): void
    {
        // Test Case 1: When num1 is greater than num2
        $this->assertTrue(BCMath::greaterThen('10', '5'));

        // Test Case 2: When num1 is less than num2
        $this->assertFalse(BCMath::greaterThen('5', '10'));

        // Test Case 3: When num1 is equal to num2
        $this->assertFalse(BCMath::greaterThen('10', '10'));
    }

    /**
     * Test the 'lessThen' method of BCMath class.
     *
     * This test will check that 'lessThen' method correctly determines whether
     * the first numeric string is less than the second one.
     */
    public function testLessThen(): void
    {
        // Test Case 1: When num1 is less than num2
        $this->assertTrue(BCMath::lessThen('4', '5'));

        // Test Case 2: When num1 is greater than num2
        $this->assertFalse(BCMath::lessThen('6', '2'));

        // Test Case 3: When num1 is equal to num2
        $this->assertFalse(BCMath::lessThen('3', '3'));
    }
}
