<?php


use App\Http\Controllers\Dashboard\PermissionsController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Route;


Route::view("/","dashboard.pages.home.index")->name("index");



Route::resource('users', UsersController::class)->only("store", "index", "destroy");

Route::resource('roles', RolesController::class)->only("store", "index", "destroy");

Route::resource('permissions', PermissionsController::class)->only("store", "index", "destroy");

