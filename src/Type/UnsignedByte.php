<?php
declare(strict_types=1);

namespace JDWil\Xsd\Type;

use JDWil\Xsd\Exception\ValidationException;

class UnsignedByte extends AbstractIntegerType
{
    /**
     * UnsignedByte constructor.
     * @param int $value
     * @throws ValidationException
     */
    public function __construct(int $value)
    {
        if (!$this->isInRange($value)) {
            $this->throwNotValid();
        }

        $this->value = $value;
    }

    /**
     * @return string
     * @throws ValidationException
     */
    public function __toString(): string
    {
        return sprintf('%d', $this->value);
    }

    /**
     * @param int $number
     * @return bool
     */
    private function isInRange(int $number)
    {
        return $number <= 255 && $number >= 0;
    }

    /**
     * @throws ValidationException
     */
    private function throwNotValid()
    {
        throw new ValidationException('ubyte is out of range');
    }
}
