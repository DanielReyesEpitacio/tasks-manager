<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserValidationRequest extends FormRequest
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
            "rol_id"=>"required|exists:roles,id",
            "name"=>"required",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|confirmed"
        ];
    }

    public function messages(){
        return [
            "rol_id.required"=>"Introduzca un rol",
            "rol_id.exists"=>"El rol no existe",
            "name.required"=>"Introduzca un nombre",
            "email.required"=>"Inntroduzca un email",
            "email.email"=>"Introduzca un email válido",
            "email.unique"=>"El email ya está registrado",
            "password.required"=>"Introduzca una contraseña",
            "password.confirmed"=>"Confirme la contraseña"
        ];
    }
}
