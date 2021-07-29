<?php

namespace App\Http\Requests\Admin\DisabilityResume;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDisabilityResume extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize(): bool
    {
        return Gate::allows('admin.disability-resume.create');
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
            'disability' => ['required'],
            'cause' => ['nullable', 'string'],
            'percent' => ['required', 'integer'],
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

    public function getDisabilityId()
    {
        if ($this->has('disability')) {
            return $this->get('disability')['id'];
        }
        return null;
    }
}
