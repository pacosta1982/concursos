<?php

namespace App\Http\Requests\Admin\Call;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCall extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.call.edit', $this->call);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => ['sometimes', 'string'],
            'call_type_id' => ['sometimes', 'integer'],
            'position_id' => ['sometimes', 'integer'],
            'company_id' => ['sometimes', 'integer'],
            'start' => ['sometimes', 'date'],
            'end' => ['sometimes', 'date'],
            'footnote' => ['required'],

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
