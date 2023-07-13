<?php

namespace App\Http\Requests\Jury;

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
            'name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'patronymic' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1024',
            'image' => ['nullable', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.string' => 'Данное поле должно быть строкой',
            'name.max' => 'Превышено максимальное количество символов (255)',
            'last_name.string' => 'Данное поле должно быть строкой',
            'last_name.max' => 'Превышено максимальное количество символов (255)',
            'patronymic.string' => 'Данное поле должно быть строкой',
            'patronymic.max' => 'Превышено максимальное количество символов (255)',
            'description.string' => 'Данное поле должно быть строкой',
            'description.max' => 'Превышено максимальное количество символов (1024)',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
