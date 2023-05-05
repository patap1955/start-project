<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
                Rule::unique('projects', 'title')->ignore($this->route("project"))
            ],
            //"title" => "required|unique:articles|max:255",
            'descriptions' => 'max:255',
            'keywords' => 'max:255',
            "slug" => [
                "required",
                "max:255",
                Rule::unique('projects', 'slug')->ignore($this->route("project"))
            ],
            //"slug" => "required|unique:articles|max:255",
            "img" => "file|image",
            "about" => "",
            "path.*" => "mimes:jpg,png,gif,jpeg,svg"
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
