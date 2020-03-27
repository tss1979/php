<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static $categories = [
        1 => 'politics',
        2 => 'culture',
        3 => 'sport'
    ];

    protected static function getCategories()
    {
        return static::$categories;
    }

    protected static function getCategoryById($id)
    {
        return static::$categories[$id];
    }

    protected static function getId($category_name)
    {
        foreach (static::$categories as $key => $value)
        {
            if($value == $category_name)
            {
                return $key;
            }
        }
    }

}
