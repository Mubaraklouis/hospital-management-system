<?php

namespace App\Http\Controllers;

use App\Models\Diagonose;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class receiptController extends Controller
{
    //
    public function registerReceipt(String $id){

         $patient = Patient::find($id);
         $recept = Auth::user()->name;
         $registerationPrice = 25;
           $pdf = Pdf::loadView('registerReceipt', ["patient"=>$patient,
           "fee"=>$registerationPrice,
           "recept"=>$recept

        ]);
           return $pdf->stream();

    }

    //lab cashier receipt method
    public function labReceipt(String $id){
        $patient = Patient::find($id);

       $diagonoses= Patient::find($id)->diagonoses; ;
    //    dd($diagonoses);

    $sum =0;


     for($i=0; $i<count($diagonoses);$i++){
        $sum +=$diagonoses[$i]->price;
     }


          $pdf = Pdf::loadView('labReceipt', ["patient"=>$patient,
          "total"=>$sum,
          "cashier"=>Auth::user()->name

       ]);
          return $pdf->stream();

    }
}
