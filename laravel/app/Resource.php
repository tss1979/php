<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable =['link', 'slug'];

    public static function attributeNames() {
        return [
            'link' => 'Ссылка на ресурс',
            'slug' => 'Псевдоним',
        ];
    }

    public static function rules() {
        return [
            'link' => 'required|unique:resources,link',
            'slug' => 'required|alpha|unique:resources,slug',
        ];
    }

}
