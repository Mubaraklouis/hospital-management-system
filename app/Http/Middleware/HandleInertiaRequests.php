<?php

namespace App\Http\Middleware;

use App\Models\Diagonose;
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
    public function id ()
    {
        if (Auth::check()) {
            return Auth::user()->id;
        }
        else{
            return 1;
        }
    }



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

            'role' =>User::find($id)->roles
        ];
    }
}
