<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ColorRequest extends FormRequest
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
            "title" => "required|max:50",
            'code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название цвета не должно быть пустым',
            "title.max" => "Название цвета не должно превышать 50 символов",
            "code.required" => "Код цвета не должен быть пустым",
        ];
    }
}
