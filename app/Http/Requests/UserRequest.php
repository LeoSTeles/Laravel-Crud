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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email, ' . ($userId ? $userId->id : null ),
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'Campo nome é obrigatório!',
            'email.required' => 'Campo email é obrigatório!',
            'email.email' => 'Necessário que o email seja válido!',
            'email.unique' => 'Esse email já foi cadastrado!',
            'password.required' => 'Campo senha é obrigatório!',
            'password.password' => 'A senha tem que possuir no mínimo :min caracteres!',
        ];
    }
}
