<?php

namespace App\Http\Requests\TaskRole;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            "task_id"=>"required|exists:tasks,id",
            "user_id"=>"required|exists:users,id",
        ];
    }

    public function messages(){
        return [
            "task_id.required"=>"Ejila una tarea.",
            "task_id.exists"=>"La tarea no existe.",
            "user_id.required"=>"Elija a un usuario.",
            "user_id.exists"=>"El usuario no existe."
        ];
    }
}
