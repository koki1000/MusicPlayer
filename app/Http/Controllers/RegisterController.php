<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //データ登録
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password']),
        ]);

        //ログイン画面表示
        return redirect('/login');
    }
}
