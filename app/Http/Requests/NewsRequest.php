<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class NewsRequest extends FormRequest
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
     *ルールを決める
     *タイトル、記事必須
     *タイトルが30字以内
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required | max:30',
            'text'=>'required',
        ];
    }
}
