<?php

namespace App\Http\Middleware;

use App\Models\Diagonose;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';


    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Determine the role of the current user.
     *
     */

    // Function to format and return date as 'Y-m-d'
    public function getFormattedDate($daysAgo) {
        return date('Y-m-d', strtotime("-$daysAgo days"));
    }

    // Get the current day and the previous 6 days
    // $date7 = $this->getFormattedDate(0);  // Current day
    // $date6 = getFormattedDate(1);  // 1 day ago
    // $date5 = getFormattedDate(2);  // 2 days ago
    // $date4 = getFormattedDate(3);  // 3 days ago
    // $date3 = getFormattedDate(4);  // 4 days ago
    // $date2 = getFormattedDate(5);  // 5 days ago
    // $date1 = getFormattedDate(6);  // 6 days ago



    public function getFormattedMonth($monthsAgo) {
        return date('Y-m', strtotime("-$monthsAgo months"));
    }


//public  $formattedMonth = $this->getFormattedMonth(1); // 1 month ago
//public $year = date('Y', strtotime($formattedMonth));
//public $month = date('m', strtotime($formattedMonth));




    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */




    public function share(Request $request): array
    {
        $id = Auth::check() ? Auth::user()->id : 5;

        //creating the role variable


        // $role = Auth::user()->roles[0]->title ? "role" : "regular";
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),

            ],

            'diagonoses' => Diagonose::all(),

            'role' =>User::find($id)?User::find($id)->roles:null,
            'patient_count' => Patient::count(),
            'pat'=>[
                "date1"=>Patient::whereDate('created_at',$this->getFormattedDate(0))->count(),
                "date2"=>Patient::whereDate('created_at',$this->getFormattedDate(1))->count(),
                "date3"=>Patient::whereDate('created_at',$this->getFormattedDate(2))->count(),
                "date4"=>Patient::whereDate('created_at',$this->getFormattedDate(3))->count(),
                "date5"=>Patient::whereDate('created_at',$this->getFormattedDate(4))->count(),
                "date6"=>Patient::whereDate('created_at',$this->getFormattedDate(5))->count(),
                "date7"=>Patient::whereDate('created_at',$this->getFormattedDate(6))->count()
            ],
            "months"=> [
                "date1" => Patient::whereMonth('created_at', date('Y', strtotime(1)))->whereYear('created_at',  date('m', strtotime(1)))->count()
            ]

        ];
    }
}
