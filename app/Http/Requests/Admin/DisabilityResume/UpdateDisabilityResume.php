<?php

namespace App\Http\Requests\Admin\DisabilityResume;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDisabilityResume extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.disability-resume.edit', $this->disabilityResume);
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
            'disability_id' => ['sometimes', 'integer'],
            'cause' => ['nullable', 'string'],
            'percent' => ['sometimes', 'integer'],
            'certificate' => ['nullable', 'string'],
            'certificate_date' => ['nullable', 'date'],
            
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
