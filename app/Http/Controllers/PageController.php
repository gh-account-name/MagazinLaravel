<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function registrationPage(){
        return view('user.registration');
    }

    public function authPage(){
        return view('user.auth');
    }
}
