<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    
    public static function getNews()
    {
        return DB::table('news')->get();
    }

    public static function getOneNews($id)
    {
        return DB::table('news')->find($id);
    }

    public static function getNewsByCategory($category_name)
    {
         return DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->where('categories.slug', $category_name)->get();
    }


}
