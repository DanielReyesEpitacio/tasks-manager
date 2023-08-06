<?php

namespace App\Http\Requests\User;

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
     * @return array
     */
    public function rules()
    {
        return [
            "rol_id"=>"required|exists:roles,id",
            "name"=>"required",
            "last_name"=>"required",
            "email"=>"required|email",
            "password"=>"confirmed",
        ];


    }

    public function messages(){
        return [
            "rol_id.required"=>"Introduzca un rol",
            "rol_id.exists"=>"El rol no existe",
            "name.required"=>"Introduzca un nombre",
            "last_name.required"=>"Introduzca un apellido",
            "email.required"=>"Inntroduzca un email",
            "email.email"=>"Introduzca un email válido",
            "password.confirmed"=>"Confirme la contraseña"
        ];
    }
}
