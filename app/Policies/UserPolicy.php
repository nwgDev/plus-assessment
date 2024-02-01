<?php

namespace App\Policies;

use App\Models\User;
use App\Traits\GetsRolePermissions;
use App\Traits\HasPermissions;
use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;
    use GetsRolePermissions, HasPermissions;


    public function viewAny(User $user)
    {

    }

    public function view(User $user, User $model)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, User $model)
    {
        //
    }


    public function hasAllPermission(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }
        return false;
    }
}
