# Класс по работе с комплексными числами

## Сложить два комплексных числа

```php
// (1-4i)
$complex = new \Andrey9x\Complex(1, -4);
// (2+5i)
$anotherComplex = new \Andrey9x\Complex(2, 5);
echo $complex->add($anotherComplex);
// Результат: 3+i
```