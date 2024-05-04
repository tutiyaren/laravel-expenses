<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Income_sourceRequest;
use App\Models\Income_source;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class IncomeSourceController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $income_sources = Income_source::where('user_id', $userId)->get();
        return view('income_source.index', compact('income_sources'));
    }

    public function create()
    {
        return view('income_source.create');
    }

    public function store(Income_sourceRequest $request)
    {
        $income_source = new Income_source();
        $income_source->user_id = Auth::id();
        $income_source->name = $request->name;
        $income_source->save();

        return redirect()->route('income_source.index');
    }

    public function edit($id)
    {
        $income_source = Income_source::find($id);
        return view('income_source.edit', compact('income_source'));
    }

    public function update(Income_sourceRequest $request)
    {
        $income_sourceId = $request->input('id');
        $income_sourceName = $request->input('name');
        $income_source = Income_source::find($income_sourceId);
        $income_source->name = $income_sourceName;
        $income_source->save();
        return redirect()->route('income_source.index');
    }

    public function delete(Request $request)
    {
        $income_sourceId = $request->input('id');
        $usedInIncomes = Income::where('income_source_id', $income_sourceId)->exists();
        if ($usedInIncomes) {
            return redirect()->back()->with('error', 'この収入源は支出に使用されているため、削除できません。');
        }
        $income_source = Income_source::find($income_sourceId);
        $income_source->delete();
        return redirect()->route('income_source.index');
    }
}
