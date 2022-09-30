<?php


namespace App\Traits\Permissions;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;

trait HasPermissions
{

    /**
     * attach passed permissions to user if not exists
     *
     * or detach if exists
     *
     * @param $q Builder
     * @param ...$permissions
     * @return $this
     */
    public function scopeGivePermissionsTo($q, ...$permissions)
    {

        $perms = array_key_exists(0, $permissions) && is_array($permissions[0]);

        $permissions = $this->getAllPermissions($perms ? $permissions[0] : $permissions);

        if ($permissions === null) {
            return $this;
        }

        foreach ($permissions as $permission) {
            if (!$this->isPermissionsAttached($permission)) {
                $this->permissions()->attach($permission);
            }
        }

        return $this;
    }

    /**
     * attach passed permissions to user if not exists
     *
     * or detach if exists
     *
     * @param $q Builder
     * @param ...$permissions
     * @return $this
     */
    public function scopeTogglePermissionsTo($q, ...$permissions)
    {
        $this->permissions()->toggle($this->getAllPermissions($permissions)->pluck("id"));

        return $this;
    }


    /**
     * get all permissions are passed
     */
    protected function getAllPermissions(array $permissions)
    {

        return Permission::whereIn('slug', $permissions)->get();

    }

    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {

        return $this->belongsToMany(Permission::class, 'users_permissions');

    }

    /**
     * detach passed permissions from user
     *
     * @param $q Builder
     * @param ...$permissions
     * @return $this
     */
    public function scopeRemovePermissionsTo($q, ...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;

    }

    /**
     * @param $permission
     * @return bool
     */
    public function scopeHasPermissionTo($permission)
    {

        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    /**
     *
     *
     * @param String|array $permissions
     * @return mixed
     */
    public function scopeHasAnyPermissions($q,string|array $permissions): bool
    {
        if (is_string($permissions)) {
            return $this->hasPermission($permissions);
        }

        return $this->permissions()->whereIn('slug', $permissions)->get() != null;

    }

    public function access($access)
    {

    }

    /**
     * @param $permission
     * @return bool
     */
    public function scopeHasPermissionThroughRole($permission)
    {

        foreach ($permission->first()->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * check if user has permission
     *
     * @param $permission
     * @return bool
     */
    protected function hasPermission($permission)
    {

        return (bool)$this->permissions->where('slug', is_string($permission) ? $permission :$permission?->slug)->count();
    }

    /**
     * check if user has given role
     *
     * @param String $role
     * @return bool
     */
    public function scopeHasRole($q, string $role): bool
    {
        if ($this->roles->contains('slug', $role)) {
            return true;
        }
        return false;
    }

    /**
     * check if user has given roles
     *
     * @param ...$roles
     * @return bool
     */
    public function scopeHasRoles(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * check if user has given roles
     *
     * @param ...$roles
     * @return bool
     */
    public function scopeHasAnyRoles(...$roles)
    {
        if ($this->roles()->whereIn('slug', $roles)->get()) {
            return true;
        }
        return false;
    }

    /**
     * attach passed roles to user
     *
     * @param $q Builder
     * @param ...$roles
     * @return $this
     */
    public function scopeGiveRolesTo($q, ...$roles)
    {

        $roles = $this->getAllRoles($roles);

        if ($roles === null) {
            return $this;
        }

        foreach ($roles as $role) {
            if (!$this->isRoleAttached($role)) {
                $this->roles()->attach($role);
            }
        }

        return $this;
    }


    /**
     * detach passed roles from user
     *
     * @param $q Builder
     * @param ...$roles array
     * @return $this
     */
    public function scopeRemoveRolesTo($q, ...$roles)
    {
        if ($roles) {
            $roles = $this->getAllRoles($roles);
            $this->roles()->detach($roles);
        }

        return $this;
    }

    /**
     * get all roles are passed
     *
     * @param array $roles
     * @return mixed
     */
    protected function getAllRoles(array $roles): mixed
    {

        return Role::whereIn('slug', $roles)->get();

    }

    /**
     * check if given permission is exists or not in pivot [users_permissions] table
     *
     * @param $permission
     * @return mixed|null
     */
    private function isPermissionsAttached($permission): mixed
    {
        return $this->permissions()->where("slug", $permission->slug)->first();
    }

    /**
     * check if given role is exists or not in pivot [roles_permissions] table
     *
     * @param $role
     * @return mixed|null
     */
    private function isRoleAttached($role): mixed
    {
        return $this->roles()->where("slug", $role->slug)->first();
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * @param $q Builder
     * @param ...$roles array
     * @return $this
     */
    public function scopeToggleRolesTo($q, ...$roles)
    {
        $this->roles()->toggle($this->getAllRoles($roles)->pluck("id"));

        return $this;
    }


}
