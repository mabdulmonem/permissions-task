<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        if (auth()->check()) {
            if (!$request->user()->hasRole($this->extractRole($role))) {
                abort(403);
            }

            if ($permission !== null && !$request->user()->can($permission)) {

                abort(403);
            }


            return $next($request);
        }
        return redirect()->route("login");
    }


    /**
     *
     *
     * @param $roles
     * @return array|bool|string
     */
    private function extractRole($roles): array|bool|string
    {
        $givenRoles = preg_split("/:|\|/i", $roles);

        if (count($givenRoles) > 1) {
            return $givenRoles;
        }

        return (string)$roles;
    }


}
