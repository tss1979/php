<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    
   protected $fillable =['title', 'text', 'category_id', 'isPrivate'];

   public function category()
   {
       return $this->belongsTo(Category::class, 'category_id')->first();
   }

    public static function attributeNames() {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => "Изображение"
        ];
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|max:20',
            'text' => 'required|min:5',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'image' => 'mimes:jpeg,bmp,png|max:1000',
            'isPrivate' => 'boolean'
        ];
    }
}
