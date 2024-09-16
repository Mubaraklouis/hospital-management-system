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

//        return Inertia::render('Diagonoses/index', compact('diagonoses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Diagonose in storage.
     */
    public function store(StoreDiagonoseRequest $request)
    {
        $validated = $request->validate(
            [
                "title" => "required",
            ]
        );
        //store the diagonose in the database
        Diagonose::query()->create($validated);


    }

    /**
     * Display the specified resource.
     */
    public function show(Diagonose $diagonose)
    {
        //
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
    public function update(UpdateDiagonoseRequest $request, Diagonose $diagonose)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagonose $diagonose)
    {
        //
    }
}
