<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PermissionsRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class PermissionsController extends Controller
{

    private string $view = "dashboard.pages.permissions";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        if (!canAny("read-permission")) {
            return abort(403);
        }

        $data = [
            'i' => 1,
            'title' => trans('Permissions management'),
            'permissions' => Permission::with("roles")->orderBy('id', 'DESC')->paginate(10),
        ];

        return view("{$this->view}.index", $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionsRequest $request
     * @return JsonResponse
     */
    public function store(PermissionsRequest $request): JsonResponse
    {
        if (!canAny(["create-permission", "update-permission"])) {
            return abort(403);
        }

        $permission = Permission::with("roles")->updateOrCreate(['id' => $request->id], $request->except("_token"));

        $this->set_role($request, $permission);

        return json(trans("Updated successfully", ['page' => $request->name]), 1, $permission);
    }

    private function set_role($request, $permission)
    {
        if ($role = $request->role) {
            if ($request->id) {
                $permission->roles()->detach($permission->roles->pluck('id')->toArray());
            }


            $permission->syncRoles($role);


            if ($r = Role::find($role)) {
                $r->users()->get()->map(fn($user) => $user->givePermissionsTo($request->slug));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        if (!canAny("delete-permission")) {
            return abort(403);
        }

        $role->delete();

        return json(msg: trans("Deleted successfully", ['page' => $role->name]), status: 1);
    }


}
