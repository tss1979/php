<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected function index()
    {
        return view('news')->with('newsAll', News::getNews());
    }

    protected function show($id)
    {
        return view('newsOne')->with('news', News::getOneNews($id));
    }


    protected function showNewsByCategory($category_name) {

        return view('news')->with('newsAll', News::getNewsByCategory($category_name));
    }

}
