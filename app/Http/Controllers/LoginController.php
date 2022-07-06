<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //ログインしていなければ、ログイン画面表示
    public function login(Request $request){
        $ses = $request->session()->get('txt');
        if($ses != null){
            $user_name = Auth::user()->name ;

            $param = [
            'user_name' => $user_name,
            ];

            return view('index', $param);
        } else {
            return redirect('/login');
        }
    }

    //リンクまたは会員登録後にログイン画面表示
    public function login_view(){
        $text1 = '';
        $text2 = '';
        $param = [
            'text1' => $text1,
            'text2' => $text2,
        ];
        return view('login', $param);
    }

    //ログインフォーム入力後
    public function index_view(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
        //認証成功
        $user_name = Auth::user()->name ;

        $items = User::all();

        $param = [
            'user_name' => $user_name,
            'items' => $items,
        ];

        $txt = $request->input;
        $request->session()->put('txt',$txt);

        //再生画面表示
        return view('index', $param);

        } else {

        //認証失敗
        $text1 = 'ログインに失敗しました';
        $text2 = 'メールアドレスまたはパスワードが間違っています';
        $param = [
            'text1' => $text1,
            'text2' => $text2,
        ];
        return view('login',$param);
        }
    }
}
