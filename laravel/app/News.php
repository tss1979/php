<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    
    public static function getNews()
    {
        return json_decode(Storage::get('news.json'), true);
    }

    public static function getOneNews($id)
    {
        foreach(static::getNews() as $item)
        {
            if ($item['id'] == $id)
            {
                return $item;
            }
        }

    }

    public static function getNewsByCategory($category_name)
    {
        $newsCategory = [];
        $category_id = Category::getCategoryId($category_name);
        foreach (static::getNews() as $item)
        {
            if($item['category_id'] == $category_id){
                array_push($newsCategory, $item);
            }

        }
        return $newsCategory;
    }


}
