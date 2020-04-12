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

}
