<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Finance;
use App\Models\Patient;
use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Exports\MedicalCheckupExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;    


class MedicalRecordController extends Controller
{
        
    public function exportexcel(Request $request) 
    {
        $dateExport = $request->dateExport;

        if($dateExport != null){
            $datetime = $dateExport;
        }else{
            $datetime = Carbon::now();
        }
        return Excel::download(new MedicalCheckupExport($datetime), 'Rekam-Medias '. Carbon::now().'.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalRecord = MedicalRecord::all();
        return view('medical-record.index')
        ->with('medicalRecordData', $medicalRecord);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $curPat = null)
    {
        $allPat = Patient::all();
        $medicalRecord = MedicalRecord::latest('id')->first();
        return view('medical-record.create')
        ->with("currentPatient",$curPat)
        ->with("patients",$allPat)
        ->with("lastMedical",$medicalRecord);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicalRecordRequest $request)
    {
        $newMedicalRecord = new MedicalRecord();
        $newMedicalRecord->patient_id = $request->patient_id;
        $newMedicalRecord->no = $request->no;
        $newMedicalRecord->date = $request->date;
        $newMedicalRecord->complaint = $request->complaint;
        $newMedicalRecord->diagnosis = $request->diagnosis;
        $newMedicalRecord->action = $request->action;
        $newMedicalRecord->medicine = $request->medicine;
        $newMedicalRecord->height = $request->height;
        $newMedicalRecord->weight = $request->weight;
        $newMedicalRecord->blood_pressure_sys = $request->sys;
        $newMedicalRecord->blood_pressure_dia = $request->dia;
        $newMedicalRecord->terapis = $request->terapis;
        if($request->r_total_payment > 0){
            $newMedicalRecord->payment_total = $request->r_total_payment;
        }else{
            $newMedicalRecord->payment_total = $request->f_total_payment;
        }
        
        $newMedicalRecord->total_clinic = $request->total_clinic;
        $newMedicalRecord->total_terapist = $request->total_terapist;
        $newMedicalRecord->total_herbal = $request->total_herbal;
        $newMedicalRecord->save();

        if($request->total_herbal > 0 || $request->total_terapist > 0 || $request->total_clinic > 0 ){         
            $newFinance = new Finance();
            $newFinance->name = "Pemasukan Dari Konsultasi - Total Klinik";
            $newFinance->amount = $request->r_total_payment - $request->total_clinic;
            $newFinance->description = "data dari Rekam medis nomor ".$newMedicalRecord->no;
            $newFinance->type = 1;
            $newFinance->finance_code = "A01";
            $newFinance->medical_record_id = $newMedicalRecord->id;
            $newFinance->finance_date = Carbon::now();
            $newFinance->save();
            if($request->total_herbal > 0){
                $newFinance = new Finance();
                $newFinance->name = "Pengeluaran dari biaya herbal";
                $newFinance->amount = $request->total_herbal;
                $newFinance->description = "data dari Rekam medis nomor ".$newMedicalRecord->no;
                $newFinance->type = 2;
                $newFinance->finance_code = "B01";
                $newFinance->medical_record_id = $newMedicalRecord->id;
                $newFinance->finance_date = Carbon::now();
                $newFinance->save();
            }
            if($request->total_terapist > 0){
                $newFinance = new Finance();
                $newFinance->name = "Pengeluaran dari biaya Terapis";
                $newFinance->amount = $request->total_terapist;
                $newFinance->description = "data dari Rekam medis nomor ".$newMedicalRecord->no." Nama Terapis : ".$newMedicalRecord->terapis;
                $newFinance->type = 2;
                $newFinance->finance_code = "B02";
                $newFinance->medical_record_id = $newMedicalRecord->id;
                $newFinance->finance_date = Carbon::now();
                $newFinance->save();
            }
            if($request->total_clinic > 0){
                $newFinance = new Finance();
                $newFinance->name = "Pemasukan dari biaya Klinik";
                $newFinance->amount = $request->total_clinic;
                $newFinance->description = "data dari Rekam medis nomor ".$newMedicalRecord->no;
                $newFinance->type = 1;
                $newFinance->finance_code = "A02";
                $newFinance->medical_record_id = $newMedicalRecord->id;
                $newFinance->finance_date = Carbon::now();
                $newFinance->save();
            }
        }else if($request->f_total_payment > 0) {            
            $newFinance = new Finance();
            $newFinance->name = "Pemasukan dari Konsultasi";
            $newFinance->amount = $request->f_total_payment;
            $newFinance->description = "data dari Rekam medis nomor ".$newMedicalRecord->no;
            $newFinance->type = 1;
            $newFinance->finance_code = "A01";
            $newFinance->medical_record_id = $newMedicalRecord->id;
            $newFinance->finance_date = Carbon::now();
            $newFinance->save();
        }

        return redirect()->route("medical-record.show", $newMedicalRecord->id);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return view('medical-record.detail')
        ->with("medicalRecord",$medicalRecord);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        $allPat = Patient::all();
        $curPat = Patient::find($medicalRecord->patient_id);
        return view('medical-record.edit')
        ->with("currentPatient",$curPat)
        ->with("patients",$allPat)
        ->with("medicalRecord",$medicalRecord);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalRecordRequest $request, MedicalRecord $medicalRecord)
    {
        $medicalRecord->patient_id = $request->patient_id;
        $medicalRecord->no = $request->no;
        $medicalRecord->date = $request->date;
        $medicalRecord->complaint = $request->complaint;
        $medicalRecord->diagnosis = $request->diagnosis;
        $medicalRecord->action = $request->action;
        $medicalRecord->medicine = $request->medicine;
        $medicalRecord->blood_pressure_sys = $request->sys;
        $medicalRecord->blood_pressure_dia = $request->dia;
        $medicalRecord->height = $request->height;
        $medicalRecord->weight = $request->weight;
        $medicalRecord->terapis = $request->terapis;
        $medicalRecord->save();

        return redirect()->route("medical-record.show", $medicalRecord->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route("medical-record.index");
    }

    public function print(MedicalRecord $medicalRecord) {
        return view('print.medical-record')->with('medicalRecord', $medicalRecord);
    }
    
}
