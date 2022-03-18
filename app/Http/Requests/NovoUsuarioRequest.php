<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class NovoUsuarioRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'avatar' => 'required|image'
        ];
    }

    public function messages()
    {
       return [
        'required' => 'Campo :attribute é obrigatório',
       ];
    }
}
