<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patient.index')
            ->with('patientData', $patients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $newPatien = new Patient;
        $newPatien->name = $request->name;
        $newPatien->address = $request->address;
        $newPatien->phoneNo = $request->phoneNo;
        $newPatien->religion = $request->religion;
        $newPatien->job = $request->job;
        $newPatien->age = $request->age;
        $newPatien->height = $request->height;
        $newPatien->weight = $request->weight;
        $newPatien->is_already_surgery = $request->is_already_surgery == "on" ? true : false;
        $newPatien->is_on_drugs = $request->is_on_drugs == "on" ? true : false;
        $newPatien->surgery_details = $request->surgery_details;
        $newPatien->drug_details = $request->drug_details;
        $newPatien->save();
        return redirect()->route('patient.show', $newPatien->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patient.detail')->with("patient", $patient);
    }

    /**
     * Display the specified resource.
     */
    public function print(Patient $patient)
    {
        return view('patient.print')->with("patient", $patient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit')
            ->with("patient", $patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phoneNo = $request->phoneNo;
        $patient->religion = $request->religion;
        $patient->job = $request->job;
        $patient->age = $request->age;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->is_already_surgery = $request->is_already_surgery == "on" ? true : false;
        $patient->is_on_drugs = $request->is_on_drugs == "on" ? true : false;
        $patient->surgery_details = $request->surgery_details;
        $patient->drug_details = $request->drug_details;
        $patient->save();
        return redirect()->route('patient.show', $patient->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        if ($patient->medicalRecords()->count() > 0) {

        } else {
            $patient->delete();
        }
        return redirect()->route("patient.index");
    }
}
