<?php

namespace App\Http\Controllers;

use App\Models\Diagonose;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class cashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('cashier/cashierHome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        $patient_id = $request->search;
        $diagonoses= Diagonose::all();
        $patient =   Patient::where('patient_id', $patient_id)->with(['diagonoses'])->get();

        // dd($patient);
        return inertia(
            'cashier/patientDetails',
            [
                'patient' => $patient,
                'diagonoses'=>$diagonoses
            ]
        );
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
