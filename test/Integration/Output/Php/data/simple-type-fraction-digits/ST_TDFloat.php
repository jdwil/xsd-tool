<?php
declare(strict_types=1);

namespace JDWil\Xsd\Test\SimpleType;

use JDWil\Xsd\Test\Exception\ValidationException;

class ST_TDFloat
{
    /**
     * @var float
     */
    protected $value;

    /**
     * ST_TDFloat constructor
     * @param float $value
     * @throws ValidationException
     */
    public function __construct(float $value)
    {
        $this->value = $value;

        $decimals = ((int) $this->value !== $this->value) ? (strlen($this->value) - strpos($this->value, '.')) - 1 : 0;
        if (4 !== $decimals) {
            throw new ValidationException('value can only contain 4 decimal digits');
        }
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
