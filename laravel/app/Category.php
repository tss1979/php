<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static $categories = [
        1 => [
            'id'=> 1,
            'name'=> 'Политика',
            'slug'=>'politics'
            ],
        2 => [
            'id'=> 2,
            'name'=> 'Культура',
            'slug'=>'culture'
        ],
        3 => [
            'id'=> 3,
            'name'=> 'Спорт',
            'slug'=>'sport'
        ]
    ];

    protected static function getCategories()
    {
        return static::$categories;
    }

    protected static function getCategoryById($id)
    {
        foreach (static::$categories as $category)
            if ($category['id'] == $id)
            {
                return $category;
            }

    }

    protected static function getCategoryId($category_name)
    {
        foreach (static::$categories as $category)
        {
            if($category['slug'] == $category_name)
            {
                return $category['id'];
            }
        }
    }

}
