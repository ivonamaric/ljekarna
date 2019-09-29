<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        $product = Product::find($this->product);
        return [
            'title' => 'required|unique:products,title,' . $product->id . '|max:75|min:2',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|max:100',
            'category_id' => 'required',
            'brand_id' => 'required',
            'file' => 'image|max:5000',
        ];
    }
}
