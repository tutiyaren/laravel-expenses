<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Income_sourceRequest;
use App\UseCase\income_source\CreateIncome_source;
use App\UseCase\income_source\EditIncome_source;
use App\UseCase\income_source\DeleteIncome_source;
use App\UseCase\income_source\GetEditIncome_source;
use App\UseCase\income_source\GetAllIncome_source;

class IncomeSourceController extends Controller
{
    public function index(GetAllIncome_source $case)
    {
        $income_sources = $case();
        return view('income_source.index', compact('income_sources'));
    }

    public function create()
    {
        return view('income_source.create');
    }

    public function store(Income_sourceRequest $request, CreateIncome_source $case)
    {
        $case($request);
        return redirect()->route('income_source.index');
    }

    public function edit($id, GetEditIncome_source $case)
    {
        $income_source = $case($id);
        return view('income_source.edit', compact('income_source'));
    }

    public function update(Income_sourceRequest $request, EditIncome_source $case)
    {
        $income_sourceId = $request->input('id');
        $case($request, $income_sourceId);
        return redirect()->route('income_source.index');
    }

    public function delete(Request $request, DeleteIncome_source $case)
    {
        $case($request);
        return redirect()->route('income_source.index');
    }
}
