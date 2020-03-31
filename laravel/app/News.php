<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class News extends Model
{
    protected static $news = [
        1 => [
            'id'=> 1,
            'title'=> 'Число заболевших коронавирусом в Германии близится к 40 000',
            'text'=> 'Oбщее число случаев заражения коронавирусом в Германии достигло 37 179 человек',
            'isPrivate' => false,
            'category_id' => 1
        ],
        2 => [
            'id'=> 2,
            'title'=> 'Короновирус отменил Евровидение.',
            'text'=> 'Запланированный на май в Нидерландах ежегодный, международный песенный конкурс Евровидение 2020 года официально отменен по причине распространения коронавируса.',
            'isPrivate' => false,
            'category_id' => 2
        ],
        3 => [
            'id'=> 3,
            'title'=> 'Игрок «Адмирала» получил бан за кокаин. ',
            'text'=> 'Игрок «Адмирала» получил бан за кокаин. Теперь пропустит больше года',
            'isPrivate' => false,
            'category_id' => 3
            ]
    ];
    
    public static function getNews()
    {
        return static::$news;
    }

    public static function getOneNews($id)
    {
        return static::$news[$id];
    }

    public static function getNewsByCategory($category_name)
    {
        $newsCategory = [];
        $category_id = Category::getCategoryId($category_name);
        foreach (static::$news as $item)
        {
            if($item['category_id'] == $category_id){
                array_push($newsCategory, $item);
            }

        }
        return $newsCategory;
    }


}
