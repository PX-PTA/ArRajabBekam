<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\DataTables;

class MedicalRecordController extends Controller
{
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
        $newMedicalRecord->blood_pressure_sys = $request->sys;
        $newMedicalRecord->blood_pressure_dia = $request->dia;
        $newMedicalRecord->terapis = $request->terapis;
        $newMedicalRecord->save();

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
}
