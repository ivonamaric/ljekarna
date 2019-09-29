<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCreateRequest extends FormRequest
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
            'title' => 'required|unique:products|max:75|min:2',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|max:100',
            'category_id' => 'required',
            'brand_id' => 'required',
            'file' => 'required|image|max:5000',
        ];
    }
}
