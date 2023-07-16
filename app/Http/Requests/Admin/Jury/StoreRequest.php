<?php

namespace App\Http\Requests\Admin\Jury;

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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'description' => 'required|string|max:4096',
            'image' => ['required', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Данное поле является обязательным для заполнения',
            'name.string' => 'Данное поле должно быть строкой',
            'name.max' => 'Превышено максимальное количество символов (255)',
            'last_name.required' => 'Данное поле является обязательным для заполнения',
            'last_name.string' => 'Данное поле должно быть строкой',
            'last_name.max' => 'Превышено максимальное количество символов (255)',
            'patronymic.required' => 'Данное поле является обязательным для заполнения',
            'patronymic.string' => 'Данное поле должно быть строкой',
            'patronymic.max' => 'Превышено максимальное количество символов (255)',
            'description.required' => 'Данное поле является обязательным для заполнения',
            'description.string' => 'Данное поле должно быть строкой',
            'description.max' => 'Превышено максимальное количество символов (4096)',
            'image.required' => 'Данное поле является обязательным для заполнения',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
