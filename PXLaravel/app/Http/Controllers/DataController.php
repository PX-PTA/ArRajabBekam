<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Finance;
use Carbon\Carbon;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $month, int $year)
    {
        $patientMonth = Patient::whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->count();
        $medicalRecordMonth = MedicalRecord::whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->count();
        $medicalRecordPaymentMonth = Finance::whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        ->sum('amount');

        return response()->json(['monthlyMedical'=> $medicalRecordMonth,'monthlyPatient'=>$patientMonth,'monthlyPayment'=>$medicalRecordPaymentMonth]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
