<?php

namespace App\Http\Requests\Contests;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
            'contest_type' => 'required|string|max:255',
            'initials' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'age_category' => 'required|string|max:255',
            'nomination' => 'required|string|max:255',
            'video_link' => 'nullable|string|max:2048',
            'check' => ['required', 'regex: /^(true)$/'],
            'files' => 'nullable|array|max:10',
            'files.*' => 'nullable|mimes:jpeg,jpg,bmp,webp,png|max:5124',
            'docs' => 'nullable|mimes:docx,pdf|max:10000',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'contest_type.required' => 'Данное поле является обязательным для заполнения',
            'contest_type.string' => 'Данное поле должно быть строкой',
            'contest_type.max' => 'Максимальная длина поля 255 символов',
            'initials.required' => 'Данное поле является обязательным для заполнения',
            'initials.string' => 'Данное поле должно быть строкой',
            'initials.max' => 'Максимальная длина поля 255 символов',
            'address.required' => 'Данное поле является обязательным для заполнения',
            'address.string' => 'Данное поле должно быть строкой',
            'address.max' => 'Максимальная длина поля 255 символов',
            'phone.required' => 'Данное поле является обязательным для заполнения',
            'phone.string' => 'Данное поле должно быть строкой',
            'phone.max' => 'Максимальная длина поля 255 символов',
            'email.required' => 'Данное поле является обязательным для заполнения',
            'email.string' => 'Данное поле должно быть строкой',
            'email.max' => 'Максимальная длина поля 255 символов',
            'section.required' => 'Данное поле является обязательным для заполнения',
            'section.string' => 'Данное поле должно быть строкой',
            'section.max' => 'Максимальная длина поля 255 символов',
            'video_link.string' => 'Данное поле должно быть строкой',
            'video_link.max' => 'Максимальная длина поля :max символов',
            'age_category.required' => 'Данное поле является обязательным для заполнения',
            'age_category.string' => 'Данное поле должно быть строкой',
            'age_category.max' => 'Максимальная длина поля 255 символов',
            'nomination.required' => 'Данное поле является обязательным для заполнения',
            'nomination.string' => 'Данное поле должно быть строкой',
            'nomination.max' => 'Максимальная длина поля 255 символов',
            'check.required' => 'Для подачи заявки, необходимо подтвердить согласие с положением о конкурсе',
            'check.regex' => 'Для подачи заявки, необходимо подтвердить согласие с положением о конкурсе',
            'files.max' => 'Максимальное количество прикреплённых файлов - :max',
            'files.*.mimes' => 'Можно прикрепить долько фото или видео',
            'files.*.max' => 'Размер одного файла не должен превышать :max',
            'docs.max' => 'Размер одного документа не должен превышать :max',
            'docs.mimes' => 'Можно прикрепить документ либо docx, либо pdf',
        ];
    }
}
