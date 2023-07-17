<?php

namespace App\Http\Requests\Admin\Partner;

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
            'link' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:4096',
            'logo_image' => ['nullable', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'title.max' => 'Превышено максимальное количество символов (255)',
            'link.string' => 'Данное поле должно быть строкой',
            'link.max' => 'Превышено максимальное количество символов (255)',
            'description.string' => 'Данное поле должно быть строкой',
            'description.max' => 'Превышено максимальное количество символов (4096)',
            'logo_image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
