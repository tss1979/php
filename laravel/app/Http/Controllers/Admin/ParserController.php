<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index() {
        $xml = XmlParser::load('https://news.yandex.ru/army.rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
        
        if (is_null(Category::query()->where('name', $data['title'])))
        {
             $category = new Category();
             $category->name = $data['title'];
             $category->slug = 'army';
             $category->category_image = $data['image'];
             $category->save();
         }

        
        foreach ($data['news'] as $item) {
            if (is_null(News::query()->where('title', $item['title']))) {
                $news = new News();
                $news->title = $item['title'];
                $news->text = $item['description'];
                $news->category_id = (Category::query()->where('name', $data['title'])->firstOrFail())->id;
                $news->save();
            }
        }
        return redirect()->route('admin.index');
    }

}
