<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\MedicalRecord;
use App\Http\Requests\StorefinanceRequest;
use App\Http\Requests\UpdatefinanceRequest;
use Carbon\Carbon;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finaces = Finance::orderBy("created_at","asc")->get();
        $allDataIncome = Finance::get()->where('type',1)->sum('amount');
        $allDataOutcome = Finance::get()->where('type',2)->sum('amount');

        return view('finance.index')
        ->with('financeData', $finaces)
        ->with('financeIncome', $allDataIncome)
        ->with('financeOutcome', $allDataOutcome);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(MedicalRecord $curMedical = null)
    {
        return view('finance.create')
        ->with('curentMedical', $curMedical);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefinanceRequest $request,MedicalRecord $curMedical = null)
    {
        $newFinance = new Finance();
        $newFinance->name = $request->name;
        $newFinance->amount = $request->amount;
        $newFinance->description = $request->description;
        $newFinance->type = $request->type;
        $newFinance->finance_code = $request->finance_code;
        if($curMedical != null){
            $newFinance->medical_record_id = $curMedical->id;
        }
        $newFinance->finance_date = Carbon::now();
        $newFinance->save();
        if($curMedical != null){
            return redirect()->route('medical-record.show',$curMedical->id);
            
        }
        return redirect()->route("finance.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefinanceRequest $request, finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(finance $finance)
    {
        //
    }
}
