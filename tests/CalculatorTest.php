<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Calculator;


class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $result = $calculator->add(2, 3);
        $this->assertEquals(5, $result, 'La méthode doit retourner 5');
        $this->assertIsFloat($result, 'Doit retouner un float');
    }
}

