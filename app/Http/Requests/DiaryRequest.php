<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'title' => 'required|min:3',
			'content' => 'required|max:200',
			'user_id' => 'requierd|exists:users,id',
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'タイトルを入力してください。',
			'title.min' => 'タイトルは3文字以上で入力してください。',
			'content.required' => '本文を入力してください。',
			'content.max' => '本文は200文字以内で入力してください。',
		];
	}
}
