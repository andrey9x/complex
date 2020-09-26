<?php


namespace Andrey9x;


class Complex
{
    /** @var float Действительная часть */
    private float $realPart;
    /** @var float Мнимая часть */
    private float $imaginaryPart;
    /** @var string Суффикс */
    private string $suffix = 'i';

    public function __construct(float $realPart, float $imaginaryPart)
    {
        $this->realPart = $realPart;
        $this->imaginaryPart = $imaginaryPart;
    }

    /**
     * Сложение
     *
     * @param Complex $complex
     * @return Complex
     */
    public function add(self $complex)
    {
        $realPart = $this->realPart + $complex->realPart;
        $imaginaryPart = $this->imaginaryPart + $complex->imaginaryPart;

        return new self($realPart, $imaginaryPart);
    }

    /**
     * Вычитание
     *
     * @param Complex $complex
     * @return Complex
     */
    public function subtract(self $complex)
    {
        $realPart = $this->realPart - $complex->realPart;
        $imaginaryPart = $this->imaginaryPart - $complex->imaginaryPart;

        return new self($realPart, $imaginaryPart);
    }

    /**
     * Умножение
     *
     * @param Complex $complex
     * @return Complex
     */
    public function multiply(self $complex)
    {
        $realPart = $this->realPart * $complex->realPart + -1 * $this->imaginaryPart * $complex->imaginaryPart;
        $imaginaryPart = $this->realPart * $complex->imaginaryPart + $this->imaginaryPart * $complex->realPart;

        return new self($realPart, $imaginaryPart);
    }

    /**
     * Деление
     *
     * @param Complex $complex
     * @return Complex
     */
    public function divide(self $complex)
    {
        $conjugateDenominator = new self(abs($complex->realPart), abs($complex->imaginaryPart));
        $complexNumerator = $this->multiply($conjugateDenominator);
        $complexDenominator = $complex->multiply($conjugateDenominator);

        return new self(
            $complexNumerator->realPart / $complexDenominator->realPart,
            $complexNumerator->imaginaryPart / $complexDenominator->realPart
        );
    }

    public function __toString(): string
    {
        $content = $this->realPart;
        $operand = '+';
        if ($this->imaginaryPart == 0) {
            return (string)$this->realPart;
        }
        if ($this->imaginaryPart < 0) {
            $operand = '-';
        }
        if ($this->imaginaryPart == 1) {
            $imaginaryPart = '';
        } else {
            $imaginaryPart = abs($this->imaginaryPart);
        }
        $content .= $operand . $imaginaryPart . $this->suffix;

        return $content;
    }
}
