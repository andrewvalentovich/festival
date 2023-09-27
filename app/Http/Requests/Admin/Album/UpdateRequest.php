<?php

namespace App\Http\Requests\Admin\Album;

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
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'created_at' => ['nullable', 'regex:/^(\d{2})\/(\d{2})\/(\d{4}) (\d{2}):(\d{2}):(\d{2})$/i'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'title.max' => 'Максимальное количество символов для данного поля - 255',
            'description.string' => 'Данное поле должно быть строкой',
            'created_at.regex' => 'Данное поле должно быть датой',
        ];
    }
}
