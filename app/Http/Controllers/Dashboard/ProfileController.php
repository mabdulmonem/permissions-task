<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\PhotoUploader;
use App\Http\Requests\Dashboard\UsersRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UsersRequest $request
     * @return JsonResponse
     */
    public function __invoke(UsersRequest $request): JsonResponse
    {
        $this->password($request);


        User::withoutEvents(function () use ($request) {
            auth()->user()->update($this->data($request));
        });

        return json(trans("Updated successfully", ['page' => $request->name]), 1);
    }


    /**
     *
     * @param UsersRequest $request
     * @return void
     */
    private function password(UsersRequest $request)
    {
        if ($pass = $request->password) {
            $request->merge([
                'password' => Hash::make($pass)
            ]);
        } else {
            $request->merge([
                'password' => auth()->user()->password
            ]);
        }
    }

    /**
     * @param $request
     * @return array
     */
    private function data($request): array
    {
        $photo = $request->photo ? PhotoUploader::upload($request) : auth()->user()->photo;

        return array_merge($request->except("_method", "_token","photo"),['photo' => $photo]);

    }

}
