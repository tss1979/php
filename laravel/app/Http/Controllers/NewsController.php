<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected function index()
    {
        return view('news.index')->with('newsAll', News::getNews());
    }

    protected function show($id)
    {
        $news = News::getOneNews($id);

        return view('news.one')->with([
            'news' => $news,
            'category' => Category::getCategoryById($news['category_id'])]);
    }

    protected function add()
    {
        return view('news.add');
    }

    protected function showNewsByCategory($category_name) {

        return view('news.index')->with('newsAll', News::getNewsByCategory($category_name));
    }

}
