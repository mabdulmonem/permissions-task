<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PhotoUploader extends Controller
{


    /**
     * handle uploaded media to store in database and server
     *
     * @param Request $request
     * @return String path
     */
    public static function upload(Request $request): string
    {

        (new self()) ->validate($request,[ 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        $name = (new self)->name($request->photo);

        $request->file("photo")?->move(public_path(("assets/media/")), $name);

        return $request->photo ? "assets/media/" . $name : "";
    }


    /**
     * create new for new file
     *
     * @param $media
     * @return string
     */
    private function name($media): string
    {
        $name = str_replace([" ", "", "-", "/", "'", "\"", ":"], "_", now() . "_" . strtolower(str_rand(6)));

        $ext = $media?->extension();

        return "techno_masr_$name.$ext";
    }
}
