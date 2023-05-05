<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormReqest extends FormRequest
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
    public function rules():array
    {
        return [
            "name"  => "required|min:3|max:50",
            "email" => "sometimes|required|email",
            "phone" => "sometimes|required|max:25",
            "text"  => "sometimes|max:255",
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Поле с именем не должно быть пустым',
            'name.min' => 'Поле с именем должно быть минимум 3 символа',
            'name.max' => 'Поле с именем должно быть максимум 50 символа',
            "email.required" => "Поле с E-mail не должно быть пустым",
            "email.email" => "Поле с E-mail должно быть валидным адресом электронной почты",
            'phone.required' => 'Поле с телефоном не должно быть пустым',
            "text.max" => "Поле с текстом должно состоять максимум из 255 символов",
        ];
    }
}
