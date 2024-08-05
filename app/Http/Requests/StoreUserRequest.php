<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'fullname' => ['required', 'min:10'],
            'username' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'avatar' => ['required', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Họ tên ko đc để trống',
            'fullname.min' => 'Tên ko đc nhỏ hơn 10 ký tự',
            'username.required' => 'Tên tài khoản ko đc để trống',
            'username.min' => 'Tên tài khoản ko đc nhỏ hơn 5 ký tự',
            'email.required' => 'Email ko đc để trống',
            'email.min' => 'Email ko đúng định dạng',
            'password.required' => 'Mật khẩu ko đc để trống',
            'password.min' => 'Mật khẩu ko đc nhỏ hơn 6 ký tự',
            'avatar.required' => 'Hãy nhập ảnh',
            'avatar.image' => 'Ảnh ko đúng định dạng',
        ];
    }
}
