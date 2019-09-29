<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $user = User::find($this->user);

        return [
            //
            'name' => 'required|alpha|max:191|min:2',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:191',
            'password' => 'sometimes|nullable|max:191|min:6',
            'repeat_password' => 'sometimes|same:password',
            'file' => 'image|max:5000',
        ];
    }
}
