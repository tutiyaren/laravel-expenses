<?php
namespace App\UseCase\income_source;
use App\Models\Income_source;
use Illuminate\Http\Request;
use App\Models\Income;

class DeleteIncome_source
{
    public function __invoke(Request $request)
    {
        $income_sourceId = $request->input('id');
        $usedInIncomes = Income::where('income_source_id', $income_sourceId)->exists();
        if ($usedInIncomes) {
            return redirect()->back()->with('error', 'この収入源は収入に使用されているため、削除できません。');
        }
        $income_source = Income_source::find($income_sourceId);
        $income_source->delete();
    }
}
