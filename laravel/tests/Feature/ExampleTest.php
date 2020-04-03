<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeText('Добро пожаловать');

        $response = $this->get('/admin');

        $response->assertStatus(200);

        $response->assertSeeText('Админка');

        $response = $this->get('/news');

        $response->assertSuccessful();

        $response->assertViewIs('news.index');

    }
}
