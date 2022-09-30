<?php

namespace App\Traits\Permissions;

use Illuminate\Database\Query\Builder;

trait HasCreatePermissions
{

    /**
     * insert single permission to permissions table
     *
     * @param $q Builder
     * @param String $name
     * @param String $slug
     * @param String|null $name_ar
     * @return $this
     */
    public function scopeCreatePermission($q, string $name, string $slug, string $name_ar = null)
    {

        if ($this->isPermission($slug)) {
            return $this;
        }

        return $this->create([
            'name' => $name,
            'slug' => static::handleSlug($slug),
            'name_ar' => $name_ar,
        ]);

//        return $this;
    }

    /**
     * check if permission is exists
     *
     * @param $permission
     * @return mixed
     */
    public function isPermission($permission): mixed
    {
        return $this->where("slug", $permission)->get()->first();
    }

    /**
     * replace special chars with [-]
     *
     * @param string $slug
     * @return string
     */
    public static function handleSlug(string $slug): string
    {
        $slug = str_replace(['_', ' ', ".", "/", "\/"], "-", $slug);

        return strtolower($slug);
    }

    /**
     * insert all given permission to permissions table
     *
     * @param $q Builder
     * @param array $permissions
     * @param $role
     * @return $this
     */
    public function scopeCreatPermissions($q, array $permissions, $role)
    {
        foreach ($permissions as $permission) {
            $this->createPermission($permission['name'], $permission['slug'], $permission['name_ar'])->roles()->toggle($role);
        }

        return $this;
    }

    /**
     * @param $q Builder
     * @param array $roles
     * @return array|array[]
     */
    public function scopeSyncRoles($q,... $roles)
    {
        return $this->roles()->toggle($roles);
    }


}
