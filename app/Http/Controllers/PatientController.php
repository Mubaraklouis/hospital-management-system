<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Inertia\Inertia;
use App\Policies\PatientPolicy;



class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient, PatientPolicy $patientPolicy)
    {


        if ($patientPolicy->view($patient)) {
            $patients = Patient::query()->latest()->filter()->get();
            return Inertia::render('patients/index', [
                "patients" => $patients,


            ]);
        } else {
            //abort the request
            abort(403, 'unauthorize request');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient, PatientPolicy $patientPolicy)
    {

        if ($patientPolicy->view($patient)) {

            return Inertia::render('patients/create');
        } else {
            abort(403, 'unauthorize request');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request ,PatientPolicy $patientPolicy, Patient $patient)
    {



        if ($patientPolicy->view($patient)) {
            $validated = $request->validate(
                [
                    "name" => "required",
                    "phone" => "required",
                    "age" => "required",
                    "gender" => "required"
                ]
            );
            Patient::query()->create($validated);
            return redirect()->route('patients.index');
        } else {
            abort(403, 'unauthorize request');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id, Patient $patient ,PatientPolicy $patientPolicy )
    {


        if ($patientPolicy->view($patient)) {

            $patient = Patient::query()->find($id);
            return Inertia::render('patients/edite', [
                "patient" => $patient
            ]);

        } else {
            //abort the request
            abort(403, 'unauthorize request');
            return redirect()->route('dashboard');
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, String $id)
    {
        $validated = $request->validate(
            [
                "name" => "required",
                "phone" => "required",
                "age" => "required",
                "gender" => "required"
            ]
        );

        $patient = Patient::query()->find($id);
        $patient->update($validated);
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $patient = Patient::query()->find($id);
        $patient->delete();
    }
}
