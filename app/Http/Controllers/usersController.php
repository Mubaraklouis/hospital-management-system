<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Policies\usersPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class usersController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(User $user, usersPolicy $usersPolicy)
    {


        if ($usersPolicy->view($user)) {
            $users = User::with('roles');
            return Inertia::render('users/userIndex', [
                "users" => $users->paginate(4),


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
    public function create(User $user, usersPolicy $usersPolicy)
    {

        if ($usersPolicy->view($user)) {
            $users = $user->query()->latest()->filter()->get();
            return Inertia::render('users/userCreate', [
                "users" => $users,


            ]);
        } else {
            //abort the request
            abort(403, 'unauthorize request');
            return redirect()->route('dashboard');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(String $id, User $user ,usersPolicy $usersPolicy )
    {

        if ($usersPolicy->view($user)) {
            $u = $user->query()->find($id);
            return Inertia::render('users/editUser', [
                "user" => $u,


            ]);
        } else {
            //abort the request
            abort(403, 'unauthorize request');
            return redirect()->route('dashboard');
        }


    }





    public function update(Request $request, String $id)
    {
        $validated = $request->validate(
            [
                "name" => "required",
                "email" => "required",
                "password" => "required",

            ]
        );

        $user = User::query()->find($id);
        $user->update($validated);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $user = User::query()->find($id);
        $user->delete();
    }




    public function searchUser(Request $request ,User $user)
    {
        $email =$request->usersearch;
        $roles= Roles::all();

        $user =   User::where('email',$email)->with('roles')->get();

        // dd($patient);
        return Inertia::render(
            'users/userDetails',
            [
                'user' => $user,
                'roles'=>$roles
            ]
        );
    }


    public function assignRole( String $id, Request $request){


             $user_id =$request['user_id'];
             $role= Roles::find($id);
            //  dd($role);
             $t=$role->users();
             $t->attach($user_id);
    }



}
