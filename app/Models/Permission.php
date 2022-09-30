<?php

namespace App\Models;

use App\Traits\Permissions\HasCreatePermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, HasCreatePermissions;

    protected $fillable = [
        'name',
        'name_ar',
        'slug',
    ];

    public function scopeFindPermission($q, $permission)
    {

        return $this->where("slug", $permission)->first();
    }

    public function roles()
    {

        return $this->belongsToMany(Role::class, 'roles_permissions');

    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_permissions');

    }
}
