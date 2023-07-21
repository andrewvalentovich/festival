<?php

namespace App\Http\Requests\Admin\Contact;

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
            'position' => 'nullable|string|max:255',
            'phone' => ['nullable', 'string', 'max:255', 'regex:/^(\+7|8)\d{3}\d{3}\d{2}\d{2}$/'],
            'email' => 'nullable|string|max:255',
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
            'position.string' => 'Данное поле должно быть строкой',
            'position.max' => 'Превышено максимальное количество символов (255)',
            'phone.string' => 'Данное поле должно быть строкой',
            'phone.max' => 'Превышено максимальное количество символов (255)',
            'phone.regex' => 'Введите номер телефона в следующем формате 89991231212 или +79991231212',
            'email.string' => 'Данное поле должно быть строкой',
            'email.max' => 'Превышено максимальное количество символов (4096)',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
