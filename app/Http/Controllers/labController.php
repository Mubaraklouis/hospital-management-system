<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class labController extends Controller
{
    public function index(){

        $patient = Patient::all();
        return Inertia::render('lab/labHome',[labController::class,'index',[
            'patients'=>$patient,
        ]]);
    }
}
