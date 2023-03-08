<?php

namespace App\Policies;

use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TimesheetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
   

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    // public function view(User $user, Timesheet $timesheet)
    // {
    //     //

       
    // }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
   
     public function view(User $user, Timesheet $timesheet)
     {
         

         switch ($user->role) {
            case User::ROLE_ADMIN:
                return true;
            case User::ROLE_MANAGER:
                if ($user->id === $timesheet->user_id)
                    return true;


                if ($user->id === $timesheet->manager_id)
                    return true;
            case User::ROLE_USER:
                if ($user->id === $timesheet->user_id)
                    return true ;
            default:
                return false;
        }
     }
    

    public function create(User $user)
    {
        return true;
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $user, Timesheet $timesheet)
    {
        //
        return $user->id === $timesheet->user_id
        ? Response::allow()
        : Response::deny('You do not own this timesheet.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Timesheet $timesheet)
    {
        //
        return $user->id === $timesheet->user_id
        ? Response::allow()
        : Response::deny('You do not own this timesheet.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Timesheet $timesheet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Timesheet $timesheet)
    {
        //
    }
}
