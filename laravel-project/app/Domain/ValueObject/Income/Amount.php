<?php
namespace App\Domain\ValueObject\Income;
use Exception;

final class Amount
{
    const INVALID_MESSAGE = '金額は数値でお願いします';

    private $value;

    public function __construct(float $value)
    {
        if (!is_numeric($value)) {
            throw new Exception(self::INVALID_MESSAGE);
        }
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
