<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UsersRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{

    private string $view = "dashboard.pages.users";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        if (!canAny('read-users')){
            return abort(403);
        }
        $data = [
            'title' => trans('Users management'),
            'users' => User::orderBy('id', 'DESC')->paginate(10),
            'i' => 1
        ];

        return view("{$this->view}.index", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest $request
     * @return JsonResponse
     */
    public function store(UsersRequest $request): JsonResponse
    {

        if (!canAny(['create-users','update-users'])){
            return abort(403);
        }
        /**
         * check update whether
         *
         */
        if ($request->id) {
            $this->onUserUpdated($request);
        }


        $user = User::updateOrCreate(['id' => $request->id], $request->except("_token"));


        return json(trans("Updated successfully", ['page' => $request->name]), 1, $user);
    }

    private function onUserUpdated(UsersRequest $request)
    {

        /**
         * get user by given id
         *
         */
        $oldData = User::with("roles")->findOrFail($request->id);

        /**
         * insert old password to request
         *
         */
        $request->merge([
            'password' => $oldData->password
        ]);

        /**
         * get removed roles from user
         *
         */
        if ($request->role != ($oldRole = $oldData->roles->first()?->slug)) {

            $oldData->removeRolesTo($oldRole);


            /**
             * get all permission assigned to new role
             *
             */
            $removedPermissions = $oldData->roles()->roles()->with("permissions")->first()->permissions->pluck('slug')->toArray();
            /**
             * get removed permissions from user
             *
             */
            $oldData->removePermissionsTo($removedPermissions);
        }


        /**
         *  assign new roles
         */
        $role = $oldData->giveRolesTo($request->role);

        /**
         * get all permission assigned to new role
         *
         */
        $permissions = $role->roles()->with("permissions")->first()->permissions->pluck('slug')->toArray();
        /**
         *  assign new permissions
         */
        $oldData->givePermissionsTo($permissions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        if (!canAny("delete-users")){
            return abort(403);
        }

        $user->delete();

        return json(msg: trans("Deleted successfully", ['page' => $user->name]), status: 1);
    }
}
