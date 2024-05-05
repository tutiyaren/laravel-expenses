<?php
namespace App\Domain\ValueObject\Income;
use Exception;
use DateTime;

final class Accrual_date
{
    const INVALID_MESSAGE = '日付は日付形式でお願いします';

    private $value;

    public function __construct(string $value)
    {
        if (!strtotime($value)) {
            throw new Exception(self::INVALID_MESSAGE);
        }
        $this->value = new DateTime($value);
    }

    public function value(): DateTime
    {
        return $this->value;
    }
}
