<?php


use Illuminate\Support\Facades\Route;


Route::view("/", "dashboard.pages.home.index")->name("index");
