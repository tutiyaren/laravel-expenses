<?php
namespace App\UseCase\income_source;
use App\Models\Income_source;
use Illuminate\Http\Request;

class EditIncome_source
{
    public function __invoke(Request $request, $income_sourceId)
    {
        $income_sourceName = $request->input('name');
        $income_source = Income_source::find($income_sourceId);
        $income_source->name = $income_sourceName;
        $income_source->save();
    }
}
