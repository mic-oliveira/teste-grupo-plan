<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeApplianceRequest extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'voltage' => ['required'],
            'manufacturer_id' => ['required', 'exists:manufacturers,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'modelo',
            'description' => 'descrição',
            'voltage' => 'voltagem',
            'manufacturer_id' => 'id do fabricante'
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'O :attribute é obrigatório',
            'voltage.required' => 'A :attribute é obrigatório',
            '*.exists' => 'O :attribute não existe'
        ];
    }

}
