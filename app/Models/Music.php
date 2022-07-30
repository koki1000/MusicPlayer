<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'user_id',
        'title',
        'artist',
        'file',
        'file_name',
    ];
    public static $rules = [
        'user_id' => 'required',
        'title' => 'required',
        'artist' => 'required',
        'file' => 'required',
    ];
    public function getTitle(){
        return $this->title . ' / ' . $this->artist;
    }
    public function getFileName(){
        return $this->file_name;
    }
    public function user(){
     return $this->belongsTo('App\Models\User');
    }
}