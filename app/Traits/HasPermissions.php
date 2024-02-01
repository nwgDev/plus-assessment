<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * @property Collection permissions
 */
trait HasPermissions
{
    use GetsRolePermissions;

    public function getPermissionsAttribute(User $user): Collection
    {
        $permissions = collect();

        foreach ($user->roles as $role) {
            $permissions = $permissions->merge($this->getRolePermissions($role));
        }

        return $permissions;
    }

    public function hasPermission(string $permission): bool
    {
        return true;
    }

    public function hasAnyPermission(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }
}
