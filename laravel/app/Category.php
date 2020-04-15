<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\News;

class Category extends Model
{


    protected $fillable =['name', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function attributeNames() {
        return [
            'name' => 'Название категории',
            'slug' => 'Псевдоним категории',
            'category_image' => "Изображение"
        ];
    }

    public static function rules() {
        return [
            'name' => 'required|max:20|unique:categories,name',
            'slug' => 'required|alpha|unique:categories,slug',
            'category_image' => 'mimes:jpeg,bmp,png|max:1000',
        ];
    }



}
