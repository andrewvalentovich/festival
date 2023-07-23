<?php

namespace App\Http\Requests\Admin\Option;

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
            'title' => 'nullable|string',
            'type' => 'required|string',
            'key' => 'required|string',
            'value' => 'required|string',
            'description' => 'nullable|string',
            'file' => ['nullable', 'file'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'type.require' => 'Данное поле обязательно для заполнения',
            'type.string' => 'Данное поле должно быть строкой',
            'key.require' => 'Данное поле обязательно для заполнения',
            'key.string' => 'Данное поле должно быть строкой',
            'value.require' => 'Данное поле обязательно для заполнения',
            'value.string' => 'Данное поле должно быть строкой',
            'description.string' => 'Данное поле должно быть строкой',
            'file.max' => 'Загружаемый файл должен быть не более 1 Мб',
        ];
    }
}
