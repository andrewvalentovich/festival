<?php

namespace App\Http\Requests\Admin\Photo;

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
            'image' => ['required', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'image.required' => 'Данное поле является обязательным для заполнения',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
