<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use GuzzleHttp\Psr7\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::query()->get();
        return Inertia::render('patients',[
            "patients"=>$patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $validated = $request->validate(
            [
                "name"=>"required",
                "phone"=>"required",
                "age"=>"required",
                "gender"=>"required"
            ]
        );
        Patient::query()->create($validated);

    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
      return  Patient::query()->find($id);
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
                "name"=>"required",
                "phone"=>"required",
                "age"=>"required",
                "gender"=>"required"
            ]
            );

           $patient= Patient::query()->find($id);
           $patient->query()->update($validated);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $patient= Patient::query()->find($id);
        $patient->query()->delete();

    }
}
