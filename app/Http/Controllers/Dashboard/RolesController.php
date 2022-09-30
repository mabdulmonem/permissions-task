<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RolesRequest;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{

    private String $view = "dashboard.pages.roles";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index() : Application|Factory|View
    {
        if (!canAny("read-roles")){
            return abort(403);
        }
        $data = [
            'i' => 1,
            'title' => trans('Roles management'),
            'roles' => Role::with("permissions")->orderBy('id', 'DESC')->paginate(10),
        ];

        return view("{$this->view}.index", $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param RolesRequest $request
     * @return JsonResponse
     */
    public function store(RolesRequest $request): JsonResponse
    {
        if (!canAny(["create-roles","update-roles"])){
            return abort(403);
        }
        $data = Role::updateOrCreate(['id' => $request->id],$request->except("_token"));

        return json(trans("Updated successfully",['page' => $request->name]), 1, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return JsonResponse
     */
    public function destroy(Role $role) : JsonResponse
    {
        if (!canAny("delete-roles")){
            return abort(403);
        }
        $role->permissions()->delete();

        $role->delete();

        return json(msg: trans("Deleted successfully",['page' => $role->name]), status: 1);
    }


}
