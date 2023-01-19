<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'role' => 'required|integer',
        ];
    }

    public function messages() {
        return [
          'name.required' => 'Это поле необходимо для заполнения',
          'name.string' => 'Это должна быть строка',
          'email.required' => 'Это поле необходимо для заполнения',
          'email.string' => 'Почта должна быть строкой',
          'email.email' => 'Должен быть формат mail@domain.ru',
          'email.unique' => 'Пользователь с таким имейлом существует',
        ];
    }
}
