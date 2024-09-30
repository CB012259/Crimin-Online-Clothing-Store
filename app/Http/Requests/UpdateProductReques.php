<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductReques extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validate image
            'stock_quantity' => 'required|integer', //
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'material' => 'required|string|max:255',
        ];
    }

}
