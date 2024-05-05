<?php
namespace App\UseCase\income_source;
use App\Models\Income_source;

class GetEditIncome_source
{
    public function __invoke($id)
    {
        return Income_source::find($id);
    }
}
