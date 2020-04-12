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


}
