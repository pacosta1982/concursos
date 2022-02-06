<?php

namespace App\Http\Requests\Admin\Application;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreApplicationDocument extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize(): bool
    {
        return Gate::allows('admin.application.create');
    }*/

    /**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array
    {
        return [
            //'code' => ['string'],
            //'call_id' => ['string'],
            //'resume_id' => ['string'],
            'file' => ['required'],

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array
    {
        return [
            //'data' => ['string'],

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

    public function messages()
    {
        return [
            //'received_at.required' => 'Es necesario agregar una fecha al subir un documento.'
            //'document.required' => 'Es necesario seleccionar un documento.',
            'file.required' => 'Archivo Adjunto Requerido',
            //'file.mimes' => 'Solo se permite imagenes y archivos PDF'

        ];
    }
}
