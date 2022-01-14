<?php

namespace App\Http\Requests\Admin\Resume;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreResume extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize(): bool
    {
        return Gate::allows('admin.resume.create');
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'names' => ['required', 'string'],
            'last_names' => ['required', 'string'],
            'government_id' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'address' => ['required', 'string'],
            'neighborhood' => ['required', 'string'],
            'state' => ['required'],
            'city' => ['required'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'created_by' => ['sometimes'],


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

    public function getStateId()
    {
        if ($this->has('state')) {
            return $this->get('state')['DptoId'];
        }
        return null;
    }

    public function getCityId()
    {
        if ($this->has('city')) {
            return $this->get('city')['CiuId'];
        }
        return null;
    }
}
