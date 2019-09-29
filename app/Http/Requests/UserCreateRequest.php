<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            //
            'name' => 'required|alpha|max:191|min:2',
            'email' => 'required|email|unique:users|max:191',
            'password' => 'required|max:191|min:6',
            'repeat_password' => 'same:password',
            'file' => 'image|max:5000'
        ];
    }
}
