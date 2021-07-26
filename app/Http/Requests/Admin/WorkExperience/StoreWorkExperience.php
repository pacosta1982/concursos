<?php

namespace App\Http\Requests\Admin\WorkExperience;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreWorkExperience extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize(): bool
    {
        return Gate::allows('admin.work-experience.create');
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'resume_id' => ['required', 'integer'],
            'company' => ['required', 'string'],
            'position' => ['required', 'string'],
            'tasks' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'end_reason' => ['required'],
            'contact' => ['required', 'string'],

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
