<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
            "title" => [
                "required",
                "max:255",
                Rule::unique('news', 'title')->ignore($this->route("news"))
            ],
            //"title" => "required|unique:articles|max:255",
            'description' => 'max:255',
            'keywords' => '',
            "slug" => [
                "required",
                "max:255",
                Rule::unique('news', 'slug')->ignore($this->route("news"))
            ],
            "img" => "file|image",
            "status_view" => "",
            "text" => ""
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название новости не должно быть пустым',
            'title.unique' => 'Название новости должно быть уникальным',
            "title.max" => "Название новости не должно превышать 255 символов",
            "description.max" => "Краткое описание не должно превышать 255 символов",
            "img.image" => "Доступные расширения jpg, jpeg, png, bmp, gif, svg или webp",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }
}
