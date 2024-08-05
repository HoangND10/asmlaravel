<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:10'],
            'image' => ['required', 'image'],
            'price' => ['required', 'integer', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:10'],
        ];
    }

    //thông báo
    public function messages()
    {
        return [
            'title.required' => "Title ko đc để trống",
            'title.min' => "Title phải đc nhập từ 10 ký tự",
            'description.required' => "Description ko đc để trống",
            'description.min' => "Description phải đc nhập ít nhất 10 ký tự",
            'price.required' => "price ko đc để trống",
            'price.integer' => "price phải là số nguyên",
            'price.min' => "price phải là số >= 0",
            'quantity.required' => "quantity ko đc để trống",
            'quantity.integer' => "quantity phải là số nguyên",
            'quantity.min' => "quantity phải là số >= 0",
            'image.required' => "Hãy nhập ảnh",
            'image.image' => "Định dạng file ko đúng",
        ];
    }
}
