<?php

namespace App\Http\Requests\Admin\WorkExperience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateWorkExperience extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.work-experience.edit', $this->workExperience);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'resume_id' => ['sometimes', 'integer'],
            'company' => ['sometimes', 'string'],
            'position' => ['sometimes', 'string'],
            'tasks' => ['sometimes', 'string'],
            'start' => ['sometimes', 'date'],
            'end' => ['sometimes', 'date'],
            'end_reason_id' => ['sometimes', 'integer'],
            'contact' => ['sometimes', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
