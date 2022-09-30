<?php


use Illuminate\Http\JsonResponse;

if (!function_exists("_assets")) {
    function _assets($path, $folder, $plugin = null, bool $fullPath = false): string
    {
        $assets = "assets/$folder/";

        $imgTypes = ['jpeg', 'jpg', 'png', 'ico', 'svg'];
        $extension = array_reverse(explode(".", $path));

        if ($fullPath) {
            return asset($assets . "plugin/$plugin/$path");
        }
        if ($plugin) {
            $pluginFolder = is_string($plugin) ? $plugin : $extension[count($extension) - 1];
            return asset($assets . "plugin/$pluginFolder/" . $extension[0] . "/$path");
        }
        if (in_array($extension[0], $imgTypes)) {
            return asset($assets . "img/$path");
        }
        return asset($assets . $extension[0] . "/$path");
    }
}

if (!function_exists("admin_assets")) {
    function admin_assets($path, $plugin = null, bool $fullPath = false): string
    {
        return _assets($path, "dashboard", $plugin, $fullPath);
    }
}



if (!function_exists("title")) {
    function title($title): ?string
    {
        return $title ? "$title - " : null;
    }
}

if (!function_exists("str_rand")) {
    /**
     * 64 = 32
     *
     * @param int $length
     * @return string
     * @throws Exception
     */
    function str_rand(int $length = 64): string
    {
        $length = ($length < 4) ? 4 : $length;
        return bin2hex(random_bytes(($length - ($length % 2)) / 2));
    }
}


if (!function_exists("json")) {

    /**
     *
     * status 1 mean success
     * status 0 mean fail
     *
     * @param $msg
     * @param $status
     * @param $data
     * @return JsonResponse
     */
    function json($msg = null, $status = null, $data = null)
    {
        return response()->json(['status' => $status, 'msg' => $msg, 'data' => $data]);
    }
}

if (!function_exists("can")) {

    /**
     *
     * @param $role
     * @return bool
     */
    function can($role): bool
    {
        return auth()->check() && auth()->user()->hasRole($role);
    }
}
if (!function_exists("canAny")) {

    /**
     *
     * @param String|array $permission
     * @return bool
     */
    function canAny(String|array $permission): bool
    {
        return auth()->check() && auth()->user()->hasAnyPermissions($permission);
    }
}

if (!function_exists("locale")) {

    /**
     *
     * @return String
     */
    function locale(): String
    {
        if (session()->has("locale")){
            return  session()->get("locale");
        }
        return  "en";
    }
}
if (!function_exists("is_rtl")) {

    /**
     *
     * @return bool
     */
    function is_rtl(): bool
    {
        return locale() =="ar";
    }
}

if (!function_exists("panel")) {

    /**
     *
     * @return String
     */
    function panel(): String
    {
        return can("administrator") ? "dashboard." : "clients.";
    }
}
