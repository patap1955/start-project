<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
                Rule::unique('articles', 'title')->ignore($this->route("article"))
            ],
            //"title" => "required|unique:articles|max:255",
            'description' => 'max:255',
            "slug" => [
                "required",
                "max:255",
                Rule::unique('articles', 'slug')->ignore($this->route("article"))
            ],
            //"slug" => "required|unique:articles|max:255",
            "img" => "file|image",
            "status_view" => "accepted",
            "text" => ""
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название статьи не должно быть пустым',
            'title.unique' => 'Название статьи должно быть уникальным',
            "title.max" => "Название статьи не должно превышать 255 символов",
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
