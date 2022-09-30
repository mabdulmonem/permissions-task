<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::find(1);


        $user->giveRolesTo('administrator');

        $cruds = [
            'create' => 'إنشاء',
            'read' => 'عرض',
            'update' => 'تعديل',
            'delete' => 'حذف'
        ];

        $perms = [
            'users' => 'مشرف',
            'permission' => 'إذن',
            'roles' => 'الصلاحيات'
        ];

        foreach ($perms as $perm_key => $perm) {
            foreach ($cruds as $crud_key => $crud) {
                Permission::createPermission(ucfirst($crud_key) . " " . ucfirst($perm_key), "$crud_key-$perm_key", "$crud $perm")->roles()->attach(1);

            }
        }

        foreach (Permission::all() as $perm){
            $user->givePermissionsTo($perm->slug);
        }
    }
}
