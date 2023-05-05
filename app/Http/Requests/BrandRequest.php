<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
            "name" => [
                "required",
                "max:50",
                Rule::unique('brands', 'name')->ignore($this->route("brand"))
            ],
            'description' => 'max:255',
            "slug" => [
                "required",
                "max:255",
                Rule::unique('brands', 'slug')->ignore($this->route("brand"))
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название бренда не должно быть пустым',
            "name.max" => "Название бренда не должно превышать 50 символов",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
