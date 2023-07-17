<?php

namespace App\Http\Requests\Admin\Option;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string',
            'type' => 'nullable|string',
            'key' => 'nullable|string',
            'value' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'type.string' => 'Данное поле должно быть строкой',
            'key.string' => 'Данное поле должно быть строкой',
            'value.string' => 'Данное поле должно быть строкой',
            'description.string' => 'Данное поле должно быть строкой',
        ];
    }
}
