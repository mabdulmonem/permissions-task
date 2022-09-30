<?php

namespace App\Traits\Permissions;


use Illuminate\Database\Query\Builder;

trait HasCreateRole
{


    /**
     * insert single role to role table
     *
     * @param $q
     * @param string $name
     * @param string $slug
     * @param string|null $name_ar
     * @return $this
     */
    public function scopeCreateRole($q, string $name, string $slug, string $name_ar = null)
    {
        if ($this->isRole($slug)) {
            return $this;
        }

        return $this->create([
            'name' => $name,
            'slug' => $this->handleSlug($slug),
            'name_ar' => $name_ar ?: $name,
        ]);
    }

    /**
     * check if role is exists
     *
     * @param $role
     * @return mixed
     */
    public function isRole($role): mixed
    {
        return $this->where("slug", $role)->get()->first();
    }

    /**
     * replace special chars with [-]
     *
     * @param string $slug
     * @return string
     */
    private function handleSlug(string $slug): string
    {
        $slug = str_replace(['_', ' ', ".", "/", "\/"], "-", $slug);

        return strtolower($slug);
    }


    /**
     * insert all given roles to roles table
     *
     * @param $q Builder
     * @param array $roles
     * @return $this
     */
    public function scopeCreatRoles($q, array $roles)
    {
        foreach ($roles as $role) {
            $this->createRole($role['name'], $role['slug'], $role['name_ar']);
        }

        return $this;
    }


    /**
     * @param $q Builder
     * @param array $permissions
     * @return array|array[]
     */
    public function scopeSyncPermissions($q, array $permissions)
    {
        return $this->permissions()->toggle($permissions);
    }
}


