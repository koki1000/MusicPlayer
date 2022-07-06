<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Music;

class UploadController extends Controller
{
  public function add(){
      $user_name = Auth::user()->name ;
      $user_id = User::where('name',$user_name)->first()->id ;
      $param = [
            'user_id' => $user_id,
      ];
      return view('upload',$param);
  }
  public function create(UploadRequest $request){
      $form = $request->all();
      Music::create($form);
      return redirect('/upload');
  }
}