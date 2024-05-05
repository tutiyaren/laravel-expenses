<?php
namespace App\UseCase\income;
use App\Models\Income_source;

class GetCreateIncome
{
    public function __invoke()
    {
        return Income_source::get();
    }
}
