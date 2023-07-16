<?php

namespace App\Http\Requests\Admin\Album;

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
            'title' => 'required|string|max:60',
            'description' => 'nullable|string',
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
            'title.max' => 'Максимальное количество символов для данного поля - 60',
            'description.string' => 'Данное поле должно быть строкой',
        ];
    }
}
