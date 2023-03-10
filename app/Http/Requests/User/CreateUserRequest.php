<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
        'name' => ['required', 'string'],
        'last_name' => ['required', 'string'],
        'number_id' => ['required', 'numeric', 'unique:users,number_id'],
        'email' => ['required', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
		'role' => ['required'],
        ];
    }

	public function messages()
	{
		return[
			'name.requerd' => 'El nombre es requerido.',
			'name.string' => 'El nombre no es valido.',

            'last_name.requerd' => 'El apellido es requerido.',
			'last_name.string' => 'El apellido no es valido.',

            'number_id.requerd' => 'El documento es requerido.',
			'number_id.string' => 'El documento no es valido.',
            'number_id.unique' => 'El documento ya fue tomado.',

            'email.requerd' => 'El correo es requerido.',
			'email.email' => 'El correo debe ser valido.',
            'email.unique' => 'El correo ya fue tomado.',

            'password.requerd' => 'La contraseña es requerida.',
			'password.string' => 'La contraseña debe de ser valida.',
            'password.min' => 'La contraseña es muy corta min(8).',
            'password.confirmed' => 'La contraseña no coincide.',
		];
	}
}
