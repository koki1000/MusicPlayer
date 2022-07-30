<?php

namespace App\Http\Controllers;

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
      //ファイル名取得
      $file_name = $request->file('file')->getClientOriginalName();
      $request->file('file')->storeAs('public', $file_name);
      $param = [
        'user_id' => $request->user_id,
        'title' => $request->title,
        'artist' => $request->artist,
        'file' => $request->file,
        'file_name' => $file_name,
      ];
      Music::create($param);
      return redirect('/upload');
  }
}