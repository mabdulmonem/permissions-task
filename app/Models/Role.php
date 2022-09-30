<?php

namespace App\Models;

use App\Traits\Permissions\HasCreateRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasCreateRole;

    protected $fillable = [
        'name',
        'name_ar',
        'slug',
    ];


    public function scopeFindRole($q, $role)
    {
        return $this->where("slug", $role);
    }


    public function permissions()
    {

        return $this->belongsToMany(Permission::class, 'roles_permissions');

    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_roles');

    }
}
