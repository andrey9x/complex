<?php


namespace Andrey9xTests;


use Andrey9x\Complex;
use PHPUnit\Framework\TestCase;

class ComplexTest extends TestCase
{
    public function testAdd()
    {
        // (1-4i)+(2+5i)
        $complex = new Complex(1, -4);
        $anotherComplex = new Complex(2,5);
        $resultComplex = $complex->add($anotherComplex);

        $this->assertEquals($resultComplex, '3+i');
    }

    public function testZeroImaginary()
    {
        // (1-2i)+(3-2i) = 4
        $complex = new Complex(1,-2);
        $anotherComplex = new Complex(3,2);
        $resultComplex = $complex->add($anotherComplex);

        $this->assertEquals($resultComplex, '4');
    }

    public function testSubtract()
    {
        // (4+2i)-(3+i)=1+i
        $complex = new Complex(4,2);
        $anotherComplex = new Complex(3,1);
        $resultComplex = $complex->subtract($anotherComplex);

        $this->assertEquals($resultComplex, '1+i');
    }

    public function testMultiply()
    {
        // (1-i)(3+6i)=9+3i
        $complex = new Complex(1,-1);
        $anotherComplex = new Complex(3,6);
        $resultComplex = $complex->multiply($anotherComplex);

        $this->assertEquals($resultComplex, '9+3i');
    }

    public function testDivide()
    {
        // (13+i)/(7-6i)=1+i
        $complex = new Complex(13,1);
        $anotherComplex = new Complex(7,-6);
        $resultComplex = $complex->divide($anotherComplex);

        $this->assertEquals($resultComplex, '1+i');
    }
}
