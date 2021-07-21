<?php

namespace App\Http\Requests\Admin\AcademicTraining;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAcademicTraining extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.academic-training.edit', $this->academicTraining);
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
            'education_level_id' => ['sometimes', 'integer'],
            'academic_state_id' => ['sometimes', 'integer'],
            'name' => ['sometimes', 'string'],
            'institution' => ['sometimes', 'string'],
            'registered' => ['sometimes', 'boolean'],
            
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
