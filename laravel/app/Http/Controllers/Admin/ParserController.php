<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use App\Resource;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\XMLParserService;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{
    public function index()
    {
        $rsslink = Resource::query()->get();

        foreach($rsslink as $link)
        {
                NewsParsing::dispatch($link);
        }

    }
}
