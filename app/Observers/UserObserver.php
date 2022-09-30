<?php

namespace App\Observers;

use App\Http\Controllers\Utils\PhotoUploader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserObserver
{

    public function __construct(public Request $request)
    {

    }

    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        $role = $user->giveRolesTo($this->request->role);

        $permissions = $role->roles()->with("permissions")->first()->permissions->pluck('slug')->toArray();

        $user->givePermissionsTo($permissions);

        $this->queries($user);
    }

    /**
     * @param $user
     * @return void
     */
    private function queries($user): void
    {
        if ($pass = $this->request->password) {
            $user->password = Hash::make($pass);

            $user->save();
        }

        if ($this->request->photo) {

            $photo = PhotoUploader::upload($this->request);

            $user->photo = $photo;

            $user->save();

        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        $this->queries($user);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->removeRolesTo($user->roles()->first()?->slug);
    }
}
