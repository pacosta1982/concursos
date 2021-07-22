<?php

namespace App\Http\Requests\Admin\LanguageLevelResume;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreLanguageLevelResume extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.language-level-resume.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'resume_id' => ['required', 'integer'],
            'language' => ['required'],
            'language_level' => ['required'],
            'certificate' => ['required', 'boolean'],

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

    public function getLanguageId()
    {
        if ($this->has('language')) {
            return $this->get('language')['id'];
        }
        return null;
    }

    public function getLanguageLevelId()
    {
        if ($this->has('language_level')) {
            return $this->get('language_level')['id'];
        }
        return null;
    }
}
