<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:128'],
            'deadline' => ['required'],
            'description' => ['max:255'],
            'user_id' => ['required', 'numeric'],
            'client_id' => ['required', 'numeric'],
            'project_id' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The assigned user field is required.',
            'user_id.numeric' => 'This field must be numeric.',
            'client_id.required' => 'The assigned client field is required.',
            'client_id.numeric' => 'This field must be numeric.',
            'project_id.required' => 'The assigned project field is required.',
            'project_id.numeric' => 'This field must be numeric.',
        ];
    }
}
