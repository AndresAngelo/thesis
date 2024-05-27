<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAllTasksRequest extends FormRequest
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
        return [
            "name" => ['required', 'max:255'],
            "course_code" => ['nullable', 'string'],
            'prerequisite_id' => ['nullable', 'exists:all_tasks,id'],
            'corequisite_id' => ['nullable', 'exists:all_tasks,id'],
            'task_type' => [
                'required',
                Rule::in(['gec', 'special', 'standing'])
            ],
            'gec_type' => [
                'required',
                Rule::in(['gec', 'elective', 'gee'])
            ]
        ];
    }
}