<?php

namespace App\Http\Controllers;

use App\Models\Diagonose;
use App\Http\Requests\StoreDiagonoseRequest;
use App\Http\Requests\UpdateDiagonoseRequest;
use Inertia\Inertia;

class DiagonoseController extends Controller
{
    /**
     * Display a listing of the diagoneses in the databese.
     */
    public function index()
    {
        $diagonoses = Diagonose::all();

        return Inertia::render('doctor/diagonoses/diagonoseIndex', compact('diagonoses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('doctor/diagonoses/createDiagonose');

    }

    /**
     * Store a newly created Diagonose in storage.
     */
    public function store(StoreDiagonoseRequest $request)
    {
        $validated = $request->validate(
            [
                "title" => "required",
                "price"=>"required"
            ]
        );
        //store the diagonose in the database
        Diagonose::query()->create($validated);

        return redirect()->route('diagonoses.index');
    }

    /**
     * Display the specified diagonose by using the id.
     */
    public function show(String $id)
    {
        $diagonose = Diagonose::query()->find($id);
        return $diagonose;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagonose $diagonose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiagonoseRequest $request, String $id)
    {
        //get the data from the request body
        $validated = $request->validate([
            "title" => "required",
            "price" => "required"
        ]);
        //find a diagonose by the id
        $diagonose = Diagonose::query()->find($id);

        //update the data
        $diagonose->query()->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {



        // $patient_id =$request['patient_id'];
        // $patient= Patient::find($patient_id);
        // $t=$patient->diagonoses();
        // $t->attach($diagonose_id);



        $diagonose = Diagonose::query()->find($id);

        $patient = $diagonose->patients();
        $patient->detach([1,6,11]);

        $diagonose->delete();
        return redirect()->route('diagonoses.index');
    }
}
