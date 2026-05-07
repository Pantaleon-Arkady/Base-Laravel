<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login()
    { return view('pages.signup', ['mode' => 'login']); }

    public function register()
    { return view('pages.signup', ['mode' => 'register']); }
}
