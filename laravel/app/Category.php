<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{


    protected static function getCategories()
    {
        return DB::table('categories')->get();
    }

    protected static function getCategoryById($id)
    {
        return DB::table('categories')->find($id);
    }

}
