<?php
namespace App\Domain\ValueObject\Income_source;
use Exception;

final class Name
{
    const INVALID_MESSAGE = '収入源は255文字以内でお願いします';

    private $value;

    public function __construct(string $value)
    {
        if ($this->isInvalid($value)) {
            throw new Exception(self::INVALID_MESSAGE);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function isInvalid(string $value): bool
    {
        return mb_strlen($value) > 255;
    }

    public function __toString()
    {
        return $this->value;
    }
}
