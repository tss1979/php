<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected function index()
    {
        return view('news.index',['newsAll' => News::query()->orderByDesc('created_at')->paginate(3)]);
    }

    protected function show($id)
    {
        $news = News::query()->find($id);

        if (!empty($news)) {
            return view('news.one')->with([
                'news' => $news,
                'category' => $news->category()
            ]);
        } else {
            return redirect()->route('news.index');
        }

    }

    protected function showNewsByCategory($category_name)
    {
        $category = Category::query()->where('slug', $category_name)->get();
        $news = News::query()->where('category_id', $category[0]->id)->paginate(3);
        //$news = $category->news()->get();
        return view('news.index', ['newsAll' => $news]);
       // return view('news.index')->with('newsAll', $category->news());
    }

}
