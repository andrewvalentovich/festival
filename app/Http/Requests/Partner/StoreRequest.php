<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'description' => 'required|string|max:4096',
            'logo_image' => ['required', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Данное поле является обязательным для заполнения',
            'title.string' => 'Данное поле должно быть строкой',
            'title.max' => 'Превышено максимальное количество символов (255)',
            'link.required' => 'Данное поле является обязательным для заполнения',
            'link.string' => 'Данное поле должно быть строкой',
            'link.max' => 'Превышено максимальное количество символов (255)',
            'description.required' => 'Данное поле является обязательным для заполнения',
            'description.string' => 'Данное поле должно быть строкой',
            'description.max' => 'Превышено максимальное количество символов (4096)',
            'logo_image.required' => 'Данное поле является обязательным для заполнения',
            'logo_image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
