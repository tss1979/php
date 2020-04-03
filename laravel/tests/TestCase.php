<?php

namespace Tests;

use App\Category;
use App\News;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function firstTest()
    {
        $news = News::getNews();
        $this->assertIsArray($news);
        $this->assertFileExists('news.json');
        $category = Category::getCategoryById(1);
        $this->assertIsArray($category);
        $this->assertEquals("politics", $category['slug']);
    }
}
