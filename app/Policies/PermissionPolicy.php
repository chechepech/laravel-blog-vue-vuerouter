<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function viewAny(User $user)
    // {

    // }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('View permissions');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function create(User $user)
    // {
    //     return $user->hasRole('Admin');
    // }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Update permissions');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    // public function delete(User $user, Permission $permission)
    // {
    //     //
    // }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    // public function restore(User $user, Permission $permission)
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    // public function forceDelete(User $user, Permission $permission)
    // {
    //     //
    // }
}
