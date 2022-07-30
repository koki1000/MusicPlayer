<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'artist'=>'required',
            'file'=> 'required|max:60000|mimes:mp3,wav,wave,aif,aac,mp4',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'楽曲名を入力してください。',
            'artist.required'=>'アーティスト名を入力してください。',
            'file.required'=>'ファイル名を入力してください。',
            'file.max'=>'60MBを超えるファイルは添付できません。',
            'file.mimes'=>'ファイルの形式が正しくありません。',
        ];
    }
}
