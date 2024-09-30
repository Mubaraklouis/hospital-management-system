<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Diagonose;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function searchPatient(Request $request)
    {
        $diagonoses= Diagonose::all();
        $patient =   Patient::where('name', 'like', '%' . request('search') . '%')->with(['diagonoses'])->get();

        // dd($patient);
        return inertia(
            'doctor/patientDetails',
            [
                'patient' => $patient,
                'diagonoses'=>$diagonoses
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AssignTest(String $diagonose_id,Request $request)
    {
        //find the patient
        $patient_id =$request['patient_id'];
        $patient= Patient::find($patient_id);
        $t=$patient->diagonoses();
        $t->attach($diagonose_id);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return Inertia::render('doctor/home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
