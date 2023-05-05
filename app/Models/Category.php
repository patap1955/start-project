<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function categoriesAll() {
        return self::all();
    }

    public function parentCategory() {
        return self::all()->where("id", "=", $this->parent_id)->first();
    }

    public function parentCategories() {
        $array = [];
        array_unshift($array, $this);
        for ($id = $this->id; $id >= 0; $id = $this->parent_id) {
            $obj = self::where('parent_id', '=', $id)->first();
            array_unshift($array, $obj);
        }
        return $array;
    }
}
