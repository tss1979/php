<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    protected function create(Request $request)
    {
        if($request->isMethod('post'))
        {
            $url = null;
            if($request->file('image')){
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
            }

            DB::table('news')->insert([
                'title' => $request->title,
                'text'=> $request->text,
                'isPrivate' => isset($request->isPrivate),
                'image'=> $url,
                'category_id' => $request->category
            ]);

            return redirect()->route('news.index');
        }

        return view('admin.create', [
            'categories' => Category::getCategories()
        ]);
    }

}
