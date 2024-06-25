<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Finance;
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
        $medicalRecordPaymentToday = Finance::where('type',1)->whereDate('finance_date', Carbon::today())->sum('amount');
        $medicalRecordPayment = Finance::where('type',1)->whereDate('finance_date', Carbon::today())->sum('amount');
        $medicalRecordPaymentMonth = Finance::where('type',1)->
        whereMonth(
            'finance_date', '=', Carbon::now()->month
        )->sum('amount');
        $medicalRecordDataToday = MedicalRecord::whereDate('created_at', Carbon::today())->get();
        $patientDataToday = Patient::whereDate('created_at', Carbon::today())->get();

        $patientReminder = array();

        foreach($patient as $patientA){
            if(Count($patientReminder) > 5) {continue;}
            $getMedicalRecord = MedicalRecord::where('patient_id',$patientA->id)->latest('created_at')->first();
            if($patientA->notify_date < Carbon::now()->addMonth(-1)){
                if($getMedicalRecord != null)
                {
                    if( $getMedicalRecord->created_at < Carbon::now()->addMonth(-1)){
                        array_push($patientReminder,$patientA);
                    }            
                }
                else
                {
                    array_push($patientReminder,$patientA);
                }
            }
        }              

        return view('dashboard')
        ->with('medicalRecordData', $medicalRecord)
        ->with('patientData', $patient)
        ->with('medicalRecordToday',$medicalRecordToday)
        ->with('medicalRecordMonth',$medicalRecordMonth)
        ->with('patientToday',$patientToday)
        ->with('patientMonth',$patientMonth)
        ->with('medicalRecordDataToday',$medicalRecordDataToday)
        ->with('patientDataToday',$patientDataToday)
        ->with('medicalRecordPaymentToday',$medicalRecordPaymentToday)
        ->with('medicalRecordPayment',$medicalRecordPayment)
        ->with('medicalRecordPaymentMonth',$medicalRecordPaymentMonth)
        ->with('patientReminder',array_slice($patientReminder,0, 5));
    }
}
