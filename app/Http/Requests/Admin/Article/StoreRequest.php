<?php

namespace App\Http\Requests\Admin\Article;

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
            'title' => 'required|string',
            'content' => 'required|string|max:16777215',
            'video' => 'nullable|string|max:65535',
            'image' => ['required', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
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
            'content.required' => 'Данное поле является обязательным для заполнения',
            'content.string' => 'Данное поле должно быть строкой',
            'content.max' => 'Данное поле не должно превышать :max символов',
            'video.max' => 'Данное поле не должно превышать :max символов',
            'image.required' => 'Данное поле является обязательным для заполнения',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
        ];
    }
}
