<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request){
        $validation = Validator::make($request->all(), [
            'name'=>['required', 'regex:/[А-Яа-яЁё]/u'],
            'surname'=>['required', 'regex:/[А-Яа-яЁё]/u'],
            'patronymic'=>['regex:/[А-Яа-яЁё]/u',  'nullable'],
            'email'=>['required', 'email:frc', 'unique:users'],
            'login'=>['required', 'regex:/[A-Za-zА-ЯЁа-яё0-9]/u/-'],
            'password'=>['required', 'min:6', 'max:12', 'confirmed'],
            'rules'=>['required'],
        ]);
        if ($validation->fails()){
            return response()->json($validation->errors(), 400);
        }
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->password = md5($request->password);
        $user->save();

        return redirect()->route('authPage');
    }
}
