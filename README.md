# BaseConversion-php

This is a simple PHP class to convert numbers from one base to another.

It provides methods to perform conversions between binary, decimal, and hexadecimal numbers. It can also perform conversions between arbitrary radix numbers.

## Installation

```bash
composer require nave-wata/base-conversion
```

## Usage

```php
use NaveWata\BaseConversion\BaseConversion;

// Convert from binary
BaseConversion::binaryToDecimal('1111');        // 15
BaseConversion::binaryToHexadecimal('1111');    // F

// Convert from decimal
BaseConversion::decimalToBinary('2');           // 10
BaseConversion::decimalToHexadecimal('15');     // F

// Convert from hexadecimal
BaseConversion::hexadecimalToBinary('F');       // 1111
BaseConversion::hexadecimalToDecimal('F');      // 15

// Custom conversion
$custom = new BaseConversion('abcdefghijklmnopqrstuvwxyz');

$custom->decimalToCustom('25');                  // z
$custom->customToDecimal('z');                   // 25
```
