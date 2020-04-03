<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    protected function create(Request $request)
    {
        if($request->isMethod('post'))
        {
            $news = News::getNews();
            $key = count($news) + 1;
            array_push($news, [
                'id' => $key,
                'title' => $request->input('title', null),
                'text'=> $request->input('text', null),
                'category_id' => $request->input('category', null),
                'isPrivate' => ($request->input('isPrivate', null) == 'on') ? true : false,
            ]);
            Storage::disk('local')->put('news.json', json_encode($news));
            return redirect()->route('news.index');
        }
        return view('admin.create', [
            'categories' => Category::getCategories()
        ]);
    }

}
