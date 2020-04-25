<?php


namespace App\Services;

use App\Resource;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\News;

class XMLParserService
{
    public function saveNews(Resource $link)
    {
        $xml = XmlParser::load($link->link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);

        Category::firstOrCreate(
            ['name' => $data['title']],
            [
                'category_image' => $data['image'],
                'slug' => $link->slug
            ]);

        foreach ($data['news'] as $item) {
            News::firstOrCreate(
                ['title' => $item['title']],
                [
                    'text' => $item['description'],
                    'category_id' => (Category::query()->where('name', $data['title'])->firstOrFail())->id
                ]);
        }
        return redirect()->route('admin.index');
    }
}
