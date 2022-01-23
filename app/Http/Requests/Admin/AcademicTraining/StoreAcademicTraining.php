<?php

namespace App\Http\Requests\Admin\AcademicTraining;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAcademicTraining extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize(): bool
    {
        return Gate::allows('admin.academic-training.create');
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'resume_id' => ['required', 'integer'],
            'education_level' => ['required'],
            'academic_state' => ['required'],
            'name' => ['required', 'string'],
            'institution' => ['required', 'string'],
            'registered' => ['required', 'boolean'],
            'workload' => ['sometimes']

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

    public function getEducationLevelId()
    {
        if ($this->has('education_level')) {
            return $this->get('education_level')['id'];
        }
        return null;
    }

    public function getAcademicStateId()
    {
        if ($this->has('academic_state')) {
            return $this->get('academic_state')['id'];
        }
        return null;
    }
}
