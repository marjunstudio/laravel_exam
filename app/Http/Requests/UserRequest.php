<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email:strict,dns,spoof|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
        ];
    }

    public function messages()
	{
		return [
            'name.required' => 'ユーザー名を入力してください。',
            'name.min' => 'ユーザー名は3文字以上で入力してください。',
            'name.max' => 'ユーザー名は50文字以内で入力してください。',
            'email' => '有効なメールアドレスを入力してください。',
            'password.min' => 'パスワードは８文字以上で入力してください。',
            'password.max' => 'パスワードは255文字以内で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            'password.regex' => 'パスワードは少なくとも1つの小文字、1つの大文字、1つの数字を含める必要があります'
		];
	}
}
