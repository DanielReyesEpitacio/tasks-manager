<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskValidationRequest extends FormRequest
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
            "name"=>"required|min:5",
            "description"=>"required|max:1023",
            "deadline"=>"required|date",
            "comments"=>"max:255",
        ];
    }

    public function messages(){
        return [
            "name.required"=>"Introduzca un nombre para la tarea.",
            "name.min"=>"Mínimo 5 caracteres",
            "description.required"=>"Introduzca las instrucciones para la tarea.",
            "description.max"=>"La descripción debe tener menos de 1024 caracteres.",
            "deadline.required"=>"Introduzca la fecha límite de entrega.",
            "deadline.date"=>"Introduzca una fecha con el formato [].",
            "comments.max"=>"Los comentarios no deben exeder 256 caracteres.",
        ];
    }
}
