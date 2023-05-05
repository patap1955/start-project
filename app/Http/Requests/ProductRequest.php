<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            "title" => [
                "required",
                "max:255",
                Rule::unique('products', 'title')->ignore($this->route("product"))
            ],
            'description' => 'max:255',
            "slug" => [
                "required",
                "max:255",
                Rule::unique('products', 'slug')->ignore($this->route("product"))
            ],
            'category_id' => 'integer',
            'brand_id' => 'integer',
            'new' => 'sometimes|accepted',
            'sale' => 'sometimes|accepted',
            'count' => 'integer',
            'price' => 'numeric',
            'specifications' => 'nullable',
            'text' => 'nullable',
            'view_status' => 'sometimes|accepted',
            'order_status' => 'sometimes|accepted',
            'img' => 'array',
            'img.*' => 'image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'card_img' => 'image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'discount' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название продукта не должно быть пустым',
            'title.unique' => 'Название продукта должно быть уникальным',
            "title.max" => "Название продукта не должно превышать 255 символов",
            "description.max" => "Краткое описание не должно превышать 255 символов",
            'category_id.integer' => 'Выбранная категория должна быть целым числом',
            'brand_id.integer' => 'Выбранный бренд должна быть целым числом',
            'count.integer' => 'Количество товара на складе должно быть целым числом',
            'price.numeric' => 'Цена товара должна быть цисловым значением',
            'discount.required' => 'Поле со скидкой обязательно для заполнения',
            'discount.integer' => 'Поле со скидкой должно быть целым цислом от 0 до 99',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'category_id' => (int)$this->category_id,
            'brand_id' => (int)$this->brand_id,
            'count' => (int)$this->count,
            'price' => (int)$this->price,
        ]);
    }

//    public function attributes()
//    {
//
//        $files = [];
//        foreach ($this->file("img") as $file) {
//            $files[] = $file->getClientOriginalName();
//        }
//
//        return [
//            'img.*' => $files,
//        ];
//
//    }
}
