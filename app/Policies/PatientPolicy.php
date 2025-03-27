<?php

namespace App\Policies;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Patient $patients): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Patient $patient): bool
    {
        return true;
    }




    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //get the role of the authenicated user
        $role = Auth::user()->roles[0]->title;

        if ($role == "admin") {

            return true;
        } else if ($role == "recept") {
            return true;
        } else {
            abort(403, "unauthorize");
            return redirect()->route('dashboard');
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Patient $patient): bool
    {
        //get the role of the authenicated user
        $role = Auth::user()->roles[0]->title;

        if ($role == "admin") {

            return true;
        } else {
            abort(403, "unauthorize");
            return redirect()->route('dashboard');
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Patient $patient): bool
    {
           //get the role of the authenicated user
           $role = Auth::user()->roles[0]->title;

           if ($role == "admin") {

               return true;
           } else {
               abort(403, "unauthorize");
               return redirect()->route('dashboard');
           }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Patient $patient): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Patient $patient): bool
    {
     return false;
    }
}
