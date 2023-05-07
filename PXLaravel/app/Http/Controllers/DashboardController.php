<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $medicalRecord = MedicalRecord::all();
        $patient = Patient::all();
        $patientToday = Patient::whereDate('created_at', Carbon::today())->count();
        $patientMonth = Patient::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->count();
        $medicalRecordToday = MedicalRecord::whereDate('created_at', Carbon::today())->count();
        $medicalRecordMonth = MedicalRecord::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->count();

        return view('dashboard')
        ->with('medicalRecordData', $medicalRecord)
        ->with('patientData', $patient)
        ->with('medicalRecordToday',$medicalRecordToday)
        ->with('medicalRecordMonth',$medicalRecordMonth)
        ->with('patientToday',$patientToday)
        ->with('patientMonth',$patientMonth);
    }
}
