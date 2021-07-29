<?php

namespace App\Http\Requests\Admin\Call;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCall extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.call.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'string'],
            'call_type' => ['required'],
            'position' => ['required'],
            'company' => ['required'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'footnote' => ['required'],
            'vacancies' => ['required'],

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

    public function getCallTypeId()
    {
        if ($this->has('call_type')) {
            return $this->get('call_type')['id'];
        }
        return null;
    }

    public function getPositionId()
    {
        if ($this->has('position')) {
            return $this->get('position')['id'];
        }
        return null;
    }

    public function getCompanyId()
    {
        if ($this->has('company')) {
            return $this->get('company')['id'];
        }
        return null;
    }
}
