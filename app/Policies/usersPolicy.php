<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class usersPolicy
{


        /**
         * Determine whether the user can view any models.
         */
        public function viewAny( User $user): bool
        {
            return false;
        }

        /**
         * Determine whether the user can view the model.
         */
        public function view(User $user): bool
        {
            $role = Auth::user()->roles[0]->title;
             if($role == 'admin'){
                return true;
             }
        }




        /**
         * Determine whether the user can create models.
         */
        public function create(User $user): bool
        {
            //get the role of the authenicated user
            $role = Auth::user()->roles[0]->title;
            if($role == 'admin'){
                return true;
             }
        }

        /**
         * Determine whether the user can update the model.
         */
        public function update(User $user): bool
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
        public function delete(User $user): bool
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
        public function restore(User $user): bool
        {
            return false;
        }

        /**
         * Determine whether the user can permanently delete the model.
         */
        public function forceDelete(User $user): bool
        {
         return false;
        }
    }


