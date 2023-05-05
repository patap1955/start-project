<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'description' => 'max:255',
            "slug" => [
                "required",
                "max:255",
                Rule::unique('categories', 'slug')->ignore($this->route("category"))
            ],
            "parent_id" => "integer"
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название категории не должно быть пустым',
            "title.max" => "Название статьи не должно превышать 50 символов",
            "description.max" => "Краткое описание не должно превышать 255 символов",
            "parent_id.integer" => "Родительска категория должна быть числовым значением",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'parent_id' => (int)$this->parent_id
        ]);
    }
}
