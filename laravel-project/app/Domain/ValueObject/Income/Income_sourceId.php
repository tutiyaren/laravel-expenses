<?php
namespace App\Domain\ValueObject\Income;

final class Income_sourceId
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
