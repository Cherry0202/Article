<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //リクエストに対する権限設定
    public function authorize()
    {
        //誰でも編集できる
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //rules メソッドは、バリデーションルールを返す
    public function rules()
    {
        //バリデーションルールを返す
        return [
            //
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
        ];
    }
}
