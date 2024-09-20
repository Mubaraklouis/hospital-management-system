<?php

namespace App\Http\Controllers;

use App\Models\Receptant;
use App\Http\Requests\StoreReceptantRequest;
use App\Http\Requests\UpdateReceptantRequest;
use Inertia\Inertia;

class ReceptantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return Inertia::render('receptant/receptantHome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReceptantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Receptant $receptant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receptant $receptant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReceptantRequest $request, Receptant $receptant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receptant $receptant)
    {
        //
    }
}
