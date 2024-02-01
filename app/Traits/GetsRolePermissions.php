<?php


namespace App\Traits;


use App\Models\Role;
use Illuminate\Support\Collection;

trait GetsRolePermissions
{
    protected function getRolePermissions(Role $role): Collection
    {
        $options = config('access.roles')[$role->name];
        $permissions = $this->configPermissions();

        if (isset($options['all'])) {
            $permissions = $this->filterAny($permissions, $options['all']);
        }

        if (isset($options['only'])) {
            $permissions = $this->filterExcept($permissions, $options['only']);
        }

        return $permissions;
    }

    protected function configPermissions(): Collection
    {
        return collect(config('access.permissions'))->map(function ($permissions, $group) {
            return collect($permissions)->map(function ($name) use ($group) {
                return compact('group', 'name');
            });
        })->collapse();
    }

    public function filterAny(Collection $permissions, array $all): Collection
    {
        return $permissions->filter(function ($permission) use ($all) {
            return
                !in_array("{$permission['group']}.{$permission['name']}", $all) &&
                !in_array($permission['group'], $all);
        });
    }

    public function filterExcept(Collection $permissions, array $only): Collection
    {
        return $permissions->filter(function ($permission) use ($only) {
            return
                in_array("{$permission['group']}.{$permission['name']}", $only) ||
                in_array($permission['group'], $only);
        });
    }
}
