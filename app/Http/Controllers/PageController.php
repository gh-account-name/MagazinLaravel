<?php

namespace App\Http\Controllers;

use App\Models\Categry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function registrationPage(){
        return view('user.registration');
    }

    public function authPage(){
        return view('user.auth');
    }

    public function adminPage(){
        $categories = Categry::all();
        return view('admin.admin', ['categories'=>$categories]);
    }
}
